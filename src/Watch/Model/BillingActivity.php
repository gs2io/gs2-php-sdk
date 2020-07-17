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

namespace Gs2\Watch\Model;

use Gs2\Core\Model\IModel;

/**
 * 請求にまつわるアクティビティ
 *
 * @author Game Server Services, Inc.
 *
 */
class BillingActivity implements IModel {
	/**
     * @var string 請求にまつわるアクティビティ
	 */
	protected $billingActivityId;

	/**
	 * 請求にまつわるアクティビティを取得
	 *
	 * @return string|null 請求にまつわるアクティビティ
	 */
	public function getBillingActivityId(): ?string {
		return $this->billingActivityId;
	}

	/**
	 * 請求にまつわるアクティビティを設定
	 *
	 * @param string|null $billingActivityId 請求にまつわるアクティビティ
	 */
	public function setBillingActivityId(?string $billingActivityId) {
		$this->billingActivityId = $billingActivityId;
	}

	/**
	 * 請求にまつわるアクティビティを設定
	 *
	 * @param string|null $billingActivityId 請求にまつわるアクティビティ
	 * @return BillingActivity $this
	 */
	public function withBillingActivityId(?string $billingActivityId): BillingActivity {
		$this->billingActivityId = $billingActivityId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return BillingActivity $this
	 */
	public function withOwnerId(?string $ownerId): BillingActivity {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var int イベントの発生年
	 */
	protected $year;

	/**
	 * イベントの発生年を取得
	 *
	 * @return int|null イベントの発生年
	 */
	public function getYear(): ?int {
		return $this->year;
	}

	/**
	 * イベントの発生年を設定
	 *
	 * @param int|null $year イベントの発生年
	 */
	public function setYear(?int $year) {
		$this->year = $year;
	}

	/**
	 * イベントの発生年を設定
	 *
	 * @param int|null $year イベントの発生年
	 * @return BillingActivity $this
	 */
	public function withYear(?int $year): BillingActivity {
		$this->year = $year;
		return $this;
	}
	/**
     * @var int イベントの発生月
	 */
	protected $month;

	/**
	 * イベントの発生月を取得
	 *
	 * @return int|null イベントの発生月
	 */
	public function getMonth(): ?int {
		return $this->month;
	}

	/**
	 * イベントの発生月を設定
	 *
	 * @param int|null $month イベントの発生月
	 */
	public function setMonth(?int $month) {
		$this->month = $month;
	}

	/**
	 * イベントの発生月を設定
	 *
	 * @param int|null $month イベントの発生月
	 * @return BillingActivity $this
	 */
	public function withMonth(?int $month): BillingActivity {
		$this->month = $month;
		return $this;
	}
	/**
     * @var string サービスの種類
	 */
	protected $service;

	/**
	 * サービスの種類を取得
	 *
	 * @return string|null サービスの種類
	 */
	public function getService(): ?string {
		return $this->service;
	}

	/**
	 * サービスの種類を設定
	 *
	 * @param string|null $service サービスの種類
	 */
	public function setService(?string $service) {
		$this->service = $service;
	}

	/**
	 * サービスの種類を設定
	 *
	 * @param string|null $service サービスの種類
	 * @return BillingActivity $this
	 */
	public function withService(?string $service): BillingActivity {
		$this->service = $service;
		return $this;
	}
	/**
     * @var string イベントの種類
	 */
	protected $activityType;

	/**
	 * イベントの種類を取得
	 *
	 * @return string|null イベントの種類
	 */
	public function getActivityType(): ?string {
		return $this->activityType;
	}

	/**
	 * イベントの種類を設定
	 *
	 * @param string|null $activityType イベントの種類
	 */
	public function setActivityType(?string $activityType) {
		$this->activityType = $activityType;
	}

	/**
	 * イベントの種類を設定
	 *
	 * @param string|null $activityType イベントの種類
	 * @return BillingActivity $this
	 */
	public function withActivityType(?string $activityType): BillingActivity {
		$this->activityType = $activityType;
		return $this;
	}
	/**
     * @var int イベントの値
	 */
	protected $value;

	/**
	 * イベントの値を取得
	 *
	 * @return int|null イベントの値
	 */
	public function getValue(): ?int {
		return $this->value;
	}

	/**
	 * イベントの値を設定
	 *
	 * @param int|null $value イベントの値
	 */
	public function setValue(?int $value) {
		$this->value = $value;
	}

	/**
	 * イベントの値を設定
	 *
	 * @param int|null $value イベントの値
	 * @return BillingActivity $this
	 */
	public function withValue(?int $value): BillingActivity {
		$this->value = $value;
		return $this;
	}

    public function toJson(): array {
        return array(
            "billingActivityId" => $this->billingActivityId,
            "ownerId" => $this->ownerId,
            "year" => $this->year,
            "month" => $this->month,
            "service" => $this->service,
            "activityType" => $this->activityType,
            "value" => $this->value,
        );
    }

    public static function fromJson(array $data): BillingActivity {
        $model = new BillingActivity();
        $model->setBillingActivityId(isset($data["billingActivityId"]) ? $data["billingActivityId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setYear(isset($data["year"]) ? $data["year"] : null);
        $model->setMonth(isset($data["month"]) ? $data["month"] : null);
        $model->setService(isset($data["service"]) ? $data["service"] : null);
        $model->setActivityType(isset($data["activityType"]) ? $data["activityType"] : null);
        $model->setValue(isset($data["value"]) ? $data["value"] : null);
        return $model;
    }
}