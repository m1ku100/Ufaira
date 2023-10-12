<?php

namespace App\Support\Eloquent;

use Illuminate\Support\Facades\DB;
use Exception;

trait CustomSoftDelete
{
	/**
	 * Menghapus data
	 *
	 * @return boolean|string
	 */
	public function hapus()
	{
		DB::beginTransaction();

		try {
			$this->update([
				$this->status_field	=> $this->getStatusDihapus()
			]);

			$this->writeDeleteLog($this->getChanges(), 'Menghapus ' . $this->literal_name);
		} catch (Exception $exception) {
			DB::rollBack();

			return $exception->getMessage();
		}

		DB::commit();

		return true;
	}

	/**
	 * Memulihkan data
	 *
	 * @return boolean|string
	 */
	public function pulihkan()
	{
		DB::beginTransaction();

		try {
			$this->update([
				$this->status_field	=> $this->getStatusAktif()
			]);

			$this->writeRestoreLog($this->getChanges(), 'Memulihkan ' . $this->literal_name);
		} catch (Exception $exception) {
			DB::rollBack();

			return $exception->getMessage();
		}

		DB::commit();

		return true;
	}

	/**
	 * Menghapus permanen data
	 *
	 * @return boolean|string
	 */
	public function hapusPermanen()
	{
		DB::beginTransaction();

		try {
			$data = $this->toArray();

			$this->delete();

			$this->writeForceDeleteLog($data, 'Menghapus Permanen ' . $this->literal_name);
		} catch (Exception $exception) {
			DB::rollBack();

			return $exception->getMessage();
		}

		DB::commit();

		return true;
	}

	/**
	 * Mendapatkan status yang menunjukkan bahwa data
	 * sudah dihapus
	 *
	 * @return string
	 */
	public function getStatusDihapus()
	{
		return 'D';
	}

	/**
	 * Mendapatkan status yang menunjukkan bahwa
	 * sedang aktif
	 *
	 * @return string
	 */
	public function getStatusAktif()
	{
		return 'I';
	}
}
