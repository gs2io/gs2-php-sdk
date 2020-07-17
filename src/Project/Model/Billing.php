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

namespace Gs2\Project\Model;

use Gs2\Core\Model\IModel;

/**
 * 利用状況
 *
 * @author Game Server Services, Inc.
 *
 */
class Billing implements IModel {
	/**
     * @var string 利用状況
	 */
	protected $billingId;

	/**
	 * 利用状況を取得
	 *
	 * @return string|null 利用状況
	 */
	public function getBillingId(): ?string {
		return $this->billingId;
	}

	/**
	 * 利用状況を設定
	 *
	 * @param string|null $billingId 利用状況
	 */
	public function setBillingId(?string $billingId) {
		$this->billingId = $billingId;
	}

	/**
	 * 利用状況を設定
	 *
	 * @param string|null $billingId 利用状況
	 * @return Billing $this
	 */
	public function withBillingId(?string $billingId): Billing {
		$this->billingId = $billingId;
		return $this;
	}
	/**
     * @var string プロジェクト名
	 */
	protected $projectName;

	/**
	 * プロジェクト名を取得
	 *
	 * @return string|null プロジェクト名
	 */
	public function getProjectName(): ?string {
		return $this->projectName;
	}

	/**
	 * プロジェクト名を設定
	 *
	 * @param string|null $projectName プロジェクト名
	 */
	public function setProjectName(?string $projectName) {
		$this->projectName = $projectName;
	}

	/**
	 * プロジェクト名を設定
	 *
	 * @param string|null $projectName プロジェクト名
	 * @return Billing $this
	 */
	public function withProjectName(?string $projectName): Billing {
		$this->projectName = $projectName;
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
	 * @return Billing $this
	 */
	public function withYear(?int $year): Billing {
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
	 * @return Billing $this
	 */
	public function withMonth(?int $month): Billing {
		$this->month = $month;
		return $this;
	}
	/**
     * @var string リージョン
	 */
	protected $region;

	/**
	 * リージョンを取得
	 *
	 * @return string|null リージョン
	 */
	public function getRegion(): ?string {
		return $this->region;
	}

	/**
	 * リージョンを設定
	 *
	 * @param string|null $region リージョン
	 */
	public function setRegion(?string $region) {
		$this->region = $region;
	}

	/**
	 * リージョンを設定
	 *
	 * @param string|null $region リージョン
	 * @return Billing $this
	 */
	public function withRegion(?string $region): Billing {
		$this->region = $region;
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
	 * @return Billing $this
	 */
	public function withService(?string $service): Billing {
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
	 * @return Billing $this
	 */
	public function withActivityType(?string $activityType): Billing {
		$this->activityType = $activityType;
		return $this;
	}
	/**
     * @var int 回数
	 */
	protected $unit;

	/**
	 * 回数を取得
	 *
	 * @return int|null 回数
	 */
	public function getUnit(): ?int {
		return $this->unit;
	}

	/**
	 * 回数を設定
	 *
	 * @param int|null $unit 回数
	 */
	public function setUnit(?int $unit) {
		$this->unit = $unit;
	}

	/**
	 * 回数を設定
	 *
	 * @param int|null $unit 回数
	 * @return Billing $this
	 */
	public function withUnit(?int $unit): Billing {
		$this->unit = $unit;
		return $this;
	}
	/**
     * @var string 単位
	 */
	protected $unitName;

	/**
	 * 単位を取得
	 *
	 * @return string|null 単位
	 */
	public function getUnitName(): ?string {
		return $this->unitName;
	}

	/**
	 * 単位を設定
	 *
	 * @param string|null $unitName 単位
	 */
	public function setUnitName(?string $unitName) {
		$this->unitName = $unitName;
	}

	/**
	 * 単位を設定
	 *
	 * @param string|null $unitName 単位
	 * @return Billing $this
	 */
	public function withUnitName(?string $unitName): Billing {
		$this->unitName = $unitName;
		return $this;
	}
	/**
     * @var int 料金
	 */
	protected $price;

	/**
	 * 料金を取得
	 *
	 * @return int|null 料金
	 */
	public function getPrice(): ?int {
		return $this->price;
	}

	/**
	 * 料金を設定
	 *
	 * @param int|null $price 料金
	 */
	public function setPrice(?int $price) {
		$this->price = $price;
	}

	/**
	 * 料金を設定
	 *
	 * @param int|null $price 料金
	 * @return Billing $this
	 */
	public function withPrice(?int $price): Billing {
		$this->price = $price;
		return $this;
	}
	/**
     * @var string 通貨
	 */
	protected $currency;

	/**
	 * 通貨を取得
	 *
	 * @return string|null 通貨
	 */
	public function getCurrency(): ?string {
		return $this->currency;
	}

	/**
	 * 通貨を設定
	 *
	 * @param string|null $currency 通貨
	 */
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}

	/**
	 * 通貨を設定
	 *
	 * @param string|null $currency 通貨
	 * @return Billing $this
	 */
	public function withCurrency(?string $currency): Billing {
		$this->currency = $currency;
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
	 * @return Billing $this
	 */
	public function withCreatedAt(?int $createdAt): Billing {
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
	 * @return Billing $this
	 */
	public function withUpdatedAt(?int $updatedAt): Billing {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "billingId" => $this->billingId,
            "projectName" => $this->projectName,
            "year" => $this->year,
            "month" => $this->month,
            "region" => $this->region,
            "service" => $this->service,
            "activityType" => $this->activityType,
            "unit" => $this->unit,
            "unitName" => $this->unitName,
            "price" => $this->price,
            "currency" => $this->currency,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Billing {
        $model = new Billing();
        $model->setBillingId(isset($data["billingId"]) ? $data["billingId"] : null);
        $model->setProjectName(isset($data["projectName"]) ? $data["projectName"] : null);
        $model->setYear(isset($data["year"]) ? $data["year"] : null);
        $model->setMonth(isset($data["month"]) ? $data["month"] : null);
        $model->setRegion(isset($data["region"]) ? $data["region"] : null);
        $model->setService(isset($data["service"]) ? $data["service"] : null);
        $model->setActivityType(isset($data["activityType"]) ? $data["activityType"] : null);
        $model->setUnit(isset($data["unit"]) ? $data["unit"] : null);
        $model->setUnitName(isset($data["unitName"]) ? $data["unitName"] : null);
        $model->setPrice(isset($data["price"]) ? $data["price"] : null);
        $model->setCurrency(isset($data["currency"]) ? $data["currency"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}