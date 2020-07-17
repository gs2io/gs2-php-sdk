<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Stamina\Model;

use Gs2\Core\Model\IModel;

/**
 * スタミナ
 *
 * @author Game Server Services, Inc.
 *
 */
class Stamina implements IModel {
	/**
     * @var string スタミナ
	 */
	protected $staminaId;

	/**
	 * スタミナを取得
	 *
	 * @return string|null スタミナ
	 */
	public function getStaminaId(): ?string {
		return $this->staminaId;
	}

	/**
	 * スタミナを設定
	 *
	 * @param string|null $staminaId スタミナ
	 */
	public function setStaminaId(?string $staminaId) {
		$this->staminaId = $staminaId;
	}

	/**
	 * スタミナを設定
	 *
	 * @param string|null $staminaId スタミナ
	 * @return Stamina $this
	 */
	public function withStaminaId(?string $staminaId): Stamina {
		$this->staminaId = $staminaId;
		return $this;
	}
	/**
     * @var string スタミナモデルの名前
	 */
	protected $staminaName;

	/**
	 * スタミナモデルの名前を取得
	 *
	 * @return string|null スタミナモデルの名前
	 */
	public function getStaminaName(): ?string {
		return $this->staminaName;
	}

	/**
	 * スタミナモデルの名前を設定
	 *
	 * @param string|null $staminaName スタミナモデルの名前
	 */
	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}

	/**
	 * スタミナモデルの名前を設定
	 *
	 * @param string|null $staminaName スタミナモデルの名前
	 * @return Stamina $this
	 */
	public function withStaminaName(?string $staminaName): Stamina {
		$this->staminaName = $staminaName;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return Stamina $this
	 */
	public function withUserId(?string $userId): Stamina {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var int 最終更新時におけるスタミナ値
	 */
	protected $value;

	/**
	 * 最終更新時におけるスタミナ値を取得
	 *
	 * @return int|null 最終更新時におけるスタミナ値
	 */
	public function getValue(): ?int {
		return $this->value;
	}

	/**
	 * 最終更新時におけるスタミナ値を設定
	 *
	 * @param int|null $value 最終更新時におけるスタミナ値
	 */
	public function setValue(?int $value) {
		$this->value = $value;
	}

	/**
	 * 最終更新時におけるスタミナ値を設定
	 *
	 * @param int|null $value 最終更新時におけるスタミナ値
	 * @return Stamina $this
	 */
	public function withValue(?int $value): Stamina {
		$this->value = $value;
		return $this;
	}
	/**
     * @var int スタミナの最大値
	 */
	protected $maxValue;

	/**
	 * スタミナの最大値を取得
	 *
	 * @return int|null スタミナの最大値
	 */
	public function getMaxValue(): ?int {
		return $this->maxValue;
	}

	/**
	 * スタミナの最大値を設定
	 *
	 * @param int|null $maxValue スタミナの最大値
	 */
	public function setMaxValue(?int $maxValue) {
		$this->maxValue = $maxValue;
	}

	/**
	 * スタミナの最大値を設定
	 *
	 * @param int|null $maxValue スタミナの最大値
	 * @return Stamina $this
	 */
	public function withMaxValue(?int $maxValue): Stamina {
		$this->maxValue = $maxValue;
		return $this;
	}
	/**
     * @var int スタミナの回復間隔(分)
	 */
	protected $recoverIntervalMinutes;

	/**
	 * スタミナの回復間隔(分)を取得
	 *
	 * @return int|null スタミナの回復間隔(分)
	 */
	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}

	/**
	 * スタミナの回復間隔(分)を設定
	 *
	 * @param int|null $recoverIntervalMinutes スタミナの回復間隔(分)
	 */
	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}

	/**
	 * スタミナの回復間隔(分)を設定
	 *
	 * @param int|null $recoverIntervalMinutes スタミナの回復間隔(分)
	 * @return Stamina $this
	 */
	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): Stamina {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}
	/**
     * @var int スタミナの回復量
	 */
	protected $recoverValue;

	/**
	 * スタミナの回復量を取得
	 *
	 * @return int|null スタミナの回復量
	 */
	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}

	/**
	 * スタミナの回復量を設定
	 *
	 * @param int|null $recoverValue スタミナの回復量
	 */
	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}

	/**
	 * スタミナの回復量を設定
	 *
	 * @param int|null $recoverValue スタミナの回復量
	 * @return Stamina $this
	 */
	public function withRecoverValue(?int $recoverValue): Stamina {
		$this->recoverValue = $recoverValue;
		return $this;
	}
	/**
     * @var int スタミナの最大値を超えて格納されているスタミナ値
	 */
	protected $overflowValue;

	/**
	 * スタミナの最大値を超えて格納されているスタミナ値を取得
	 *
	 * @return int|null スタミナの最大値を超えて格納されているスタミナ値
	 */
	public function getOverflowValue(): ?int {
		return $this->overflowValue;
	}

	/**
	 * スタミナの最大値を超えて格納されているスタミナ値を設定
	 *
	 * @param int|null $overflowValue スタミナの最大値を超えて格納されているスタミナ値
	 */
	public function setOverflowValue(?int $overflowValue) {
		$this->overflowValue = $overflowValue;
	}

	/**
	 * スタミナの最大値を超えて格納されているスタミナ値を設定
	 *
	 * @param int|null $overflowValue スタミナの最大値を超えて格納されているスタミナ値
	 * @return Stamina $this
	 */
	public function withOverflowValue(?int $overflowValue): Stamina {
		$this->overflowValue = $overflowValue;
		return $this;
	}
	/**
     * @var int 次回スタミナが回復する時間
	 */
	protected $nextRecoverAt;

	/**
	 * 次回スタミナが回復する時間を取得
	 *
	 * @return int|null 次回スタミナが回復する時間
	 */
	public function getNextRecoverAt(): ?int {
		return $this->nextRecoverAt;
	}

	/**
	 * 次回スタミナが回復する時間を設定
	 *
	 * @param int|null $nextRecoverAt 次回スタミナが回復する時間
	 */
	public function setNextRecoverAt(?int $nextRecoverAt) {
		$this->nextRecoverAt = $nextRecoverAt;
	}

	/**
	 * 次回スタミナが回復する時間を設定
	 *
	 * @param int|null $nextRecoverAt 次回スタミナが回復する時間
	 * @return Stamina $this
	 */
	public function withNextRecoverAt(?int $nextRecoverAt): Stamina {
		$this->nextRecoverAt = $nextRecoverAt;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $lastRecoveredAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getLastRecoveredAt(): ?int {
		return $this->lastRecoveredAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $lastRecoveredAt 作成日時
	 */
	public function setLastRecoveredAt(?int $lastRecoveredAt) {
		$this->lastRecoveredAt = $lastRecoveredAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $lastRecoveredAt 作成日時
	 * @return Stamina $this
	 */
	public function withLastRecoveredAt(?int $lastRecoveredAt): Stamina {
		$this->lastRecoveredAt = $lastRecoveredAt;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Stamina $this
	 */
	public function withCreatedAt(?int $createdAt): Stamina {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Stamina $this
	 */
	public function withUpdatedAt(?int $updatedAt): Stamina {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "staminaId" => $this->staminaId,
            "staminaName" => $this->staminaName,
            "userId" => $this->userId,
            "value" => $this->value,
            "maxValue" => $this->maxValue,
            "recoverIntervalMinutes" => $this->recoverIntervalMinutes,
            "recoverValue" => $this->recoverValue,
            "overflowValue" => $this->overflowValue,
            "nextRecoverAt" => $this->nextRecoverAt,
            "lastRecoveredAt" => $this->lastRecoveredAt,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Stamina {
        $model = new Stamina();
        $model->setStaminaId(isset($data["staminaId"]) ? $data["staminaId"] : null);
        $model->setStaminaName(isset($data["staminaName"]) ? $data["staminaName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setValue(isset($data["value"]) ? $data["value"] : null);
        $model->setMaxValue(isset($data["maxValue"]) ? $data["maxValue"] : null);
        $model->setRecoverIntervalMinutes(isset($data["recoverIntervalMinutes"]) ? $data["recoverIntervalMinutes"] : null);
        $model->setRecoverValue(isset($data["recoverValue"]) ? $data["recoverValue"] : null);
        $model->setOverflowValue(isset($data["overflowValue"]) ? $data["overflowValue"] : null);
        $model->setNextRecoverAt(isset($data["nextRecoverAt"]) ? $data["nextRecoverAt"] : null);
        $model->setLastRecoveredAt(isset($data["lastRecoveredAt"]) ? $data["lastRecoveredAt"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}