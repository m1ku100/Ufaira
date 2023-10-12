<?php

namespace App\Support\Eloquent;

use App\Support\Eloquent\Events\ModelCreated;
use App\Support\Eloquent\Events\ModelCreating;
use App\Support\Eloquent\Events\ModelSaved;
use App\Support\Eloquent\Events\ModelSaving;
use App\Support\Utilities\Logging\HasHistoryActivities;
use http\Exception\BadMethodCallException;

trait HasEventListener
{
    use HasHistoryActivities;

    /**
     * registrasi event listener
     *
     * @var array
     */
    protected static $event_dispatcher = [
        'saving'    => ModelSaving::class,
        'saved'     => ModelSaved::class,
        'creating'  => ModelCreating::class,
        'created'   => ModelCreated::class
    ];

    /**
     * Registrasi listener
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            $listener = new static::$event_dispatcher['creating']($model);

            $listener->perform();
        });

        static::created(function ($model) {
            $listener = new static::$event_dispatcher['created']($model);

            $listener->perform();
        });

        static::saving(function ($model) {
            $listener = new static::$event_dispatcher['saving']($model);

            $listener->perform();
        });

        static::saved(function ($model) {
            $listener = new static::$event_dispatcher['saved']($model);

            $listener->perform();
        });
    }

    /**
     * Override method created pada Model
     *
     * @param mixed $callback
     * @return void
     */
    public static function created($callback)
    {
        parent::registerModelEvent('created', $callback);

        $model = app(static::class);

        $listener_method = $model->getEventListener('created');

        // jika pada object model terdapat method yang sesuai dengan pada
        // event listenernya, maka daftarkan pada listener model
        if (method_exists(new static, $listener_method)) {
            parent::registerModelEvent('created', function ($model) use ($listener_method) {
                if (! is_null($listener_method)) {
                    if (method_exists($model, $listener_method)) {
                        return $model->{$listener_method}();
                    } else {
                        throw new BadMethodCallException(
                            sprintf('Method %s doesn\'t exists.', $listener_method)
                        );
                    }
                }
            });
        }
    }

    /**
     * Mendapatkan custom listener pada model terkait
     *
     * @param string|null $event
     * @return string
     */
    public function getEventListener($event = null)
    {
        if (is_null($event)) {
            return $this->listeners;
        }

        if (isset($this->listeners[$event])) {
            return $this->listeners[$event];
        }

        return null;
    }
}
