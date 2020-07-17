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
 * 支払い方法
 *
 * @author Game Server Services, Inc.
 *
 */
class BillingMethod implements IModel {
	/**
     * @var string 支払い方法
	 */
	protected $billingMethodId;

	/**
	 * 支払い方法を取得
	 *
	 * @return string|null 支払い方法
	 */
	public function getBillingMethodId(): ?string {
		return $this->billingMethodId;
	}

	/**
	 * 支払い方法を設定
	 *
	 * @param string|null $billingMethodId 支払い方法
	 */
	public function setBillingMethodId(?string $billingMethodId) {
		$this->billingMethodId = $billingMethodId;
	}

	/**
	 * 支払い方法を設定
	 *
	 * @param string|null $billingMethodId 支払い方法
	 * @return BillingMethod $this
	 */
	public function withBillingMethodId(?string $billingMethodId): BillingMethod {
		$this->billingMethodId = $billingMethodId;
		return $this;
	}
	/**
     * @var string GS2アカウントの名前
	 */
	protected $accountName;

	/**
	 * GS2アカウントの名前を取得
	 *
	 * @return string|null GS2アカウントの名前
	 */
	public function getAccountName(): ?string {
		return $this->accountName;
	}

	/**
	 * GS2アカウントの名前を設定
	 *
	 * @param string|null $accountName GS2アカウントの名前
	 */
	public function setAccountName(?string $accountName) {
		$this->accountName = $accountName;
	}

	/**
	 * GS2アカウントの名前を設定
	 *
	 * @param string|null $accountName GS2アカウントの名前
	 * @return BillingMethod $this
	 */
	public function withAccountName(?string $accountName): BillingMethod {
		$this->accountName = $accountName;
		return $this;
	}
	/**
     * @var string 名前
	 */
	protected $name;

	/**
	 * 名前を取得
	 *
	 * @return string|null 名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string|null $name 名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string|null $name 名前
	 * @return BillingMethod $this
	 */
	public function withName(?string $name): BillingMethod {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 名前
	 */
	protected $description;

	/**
	 * 名前を取得
	 *
	 * @return string|null 名前
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 名前を設定
	 *
	 * @param string|null $description 名前
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 名前を設定
	 *
	 * @param string|null $description 名前
	 * @return BillingMethod $this
	 */
	public function withDescription(?string $description): BillingMethod {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 支払い方法
	 */
	protected $methodType;

	/**
	 * 支払い方法を取得
	 *
	 * @return string|null 支払い方法
	 */
	public function getMethodType(): ?string {
		return $this->methodType;
	}

	/**
	 * 支払い方法を設定
	 *
	 * @param string|null $methodType 支払い方法
	 */
	public function setMethodType(?string $methodType) {
		$this->methodType = $methodType;
	}

	/**
	 * 支払い方法を設定
	 *
	 * @param string|null $methodType 支払い方法
	 * @return BillingMethod $this
	 */
	public function withMethodType(?string $methodType): BillingMethod {
		$this->methodType = $methodType;
		return $this;
	}
	/**
     * @var string クレジットカードカスタマーID
	 */
	protected $cardCustomerId;

	/**
	 * クレジットカードカスタマーIDを取得
	 *
	 * @return string|null クレジットカードカスタマーID
	 */
	public function getCardCustomerId(): ?string {
		return $this->cardCustomerId;
	}

	/**
	 * クレジットカードカスタマーIDを設定
	 *
	 * @param string|null $cardCustomerId クレジットカードカスタマーID
	 */
	public function setCardCustomerId(?string $cardCustomerId) {
		$this->cardCustomerId = $cardCustomerId;
	}

	/**
	 * クレジットカードカスタマーIDを設定
	 *
	 * @param string|null $cardCustomerId クレジットカードカスタマーID
	 * @return BillingMethod $this
	 */
	public function withCardCustomerId(?string $cardCustomerId): BillingMethod {
		$this->cardCustomerId = $cardCustomerId;
		return $this;
	}
	/**
     * @var string カード署名
	 */
	protected $cardSignatureName;

	/**
	 * カード署名を取得
	 *
	 * @return string|null カード署名
	 */
	public function getCardSignatureName(): ?string {
		return $this->cardSignatureName;
	}

	/**
	 * カード署名を設定
	 *
	 * @param string|null $cardSignatureName カード署名
	 */
	public function setCardSignatureName(?string $cardSignatureName) {
		$this->cardSignatureName = $cardSignatureName;
	}

	/**
	 * カード署名を設定
	 *
	 * @param string|null $cardSignatureName カード署名
	 * @return BillingMethod $this
	 */
	public function withCardSignatureName(?string $cardSignatureName): BillingMethod {
		$this->cardSignatureName = $cardSignatureName;
		return $this;
	}
	/**
     * @var string カードブランド
	 */
	protected $cardBrand;

	/**
	 * カードブランドを取得
	 *
	 * @return string|null カードブランド
	 */
	public function getCardBrand(): ?string {
		return $this->cardBrand;
	}

	/**
	 * カードブランドを設定
	 *
	 * @param string|null $cardBrand カードブランド
	 */
	public function setCardBrand(?string $cardBrand) {
		$this->cardBrand = $cardBrand;
	}

	/**
	 * カードブランドを設定
	 *
	 * @param string|null $cardBrand カードブランド
	 * @return BillingMethod $this
	 */
	public function withCardBrand(?string $cardBrand): BillingMethod {
		$this->cardBrand = $cardBrand;
		return $this;
	}
	/**
     * @var string 末尾4桁
	 */
	protected $cardLast4;

	/**
	 * 末尾4桁を取得
	 *
	 * @return string|null 末尾4桁
	 */
	public function getCardLast4(): ?string {
		return $this->cardLast4;
	}

	/**
	 * 末尾4桁を設定
	 *
	 * @param string|null $cardLast4 末尾4桁
	 */
	public function setCardLast4(?string $cardLast4) {
		$this->cardLast4 = $cardLast4;
	}

	/**
	 * 末尾4桁を設定
	 *
	 * @param string|null $cardLast4 末尾4桁
	 * @return BillingMethod $this
	 */
	public function withCardLast4(?string $cardLast4): BillingMethod {
		$this->cardLast4 = $cardLast4;
		return $this;
	}
	/**
     * @var string パートナーID
	 */
	protected $partnerId;

	/**
	 * パートナーIDを取得
	 *
	 * @return string|null パートナーID
	 */
	public function getPartnerId(): ?string {
		return $this->partnerId;
	}

	/**
	 * パートナーIDを設定
	 *
	 * @param string|null $partnerId パートナーID
	 */
	public function setPartnerId(?string $partnerId) {
		$this->partnerId = $partnerId;
	}

	/**
	 * パートナーIDを設定
	 *
	 * @param string|null $partnerId パートナーID
	 * @return BillingMethod $this
	 */
	public function withPartnerId(?string $partnerId): BillingMethod {
		$this->partnerId = $partnerId;
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
	 * @return BillingMethod $this
	 */
	public function withCreatedAt(?int $createdAt): BillingMethod {
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
	 * @return BillingMethod $this
	 */
	public function withUpdatedAt(?int $updatedAt): BillingMethod {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "billingMethodId" => $this->billingMethodId,
            "accountName" => $this->accountName,
            "name" => $this->name,
            "description" => $this->description,
            "methodType" => $this->methodType,
            "cardCustomerId" => $this->cardCustomerId,
            "cardSignatureName" => $this->cardSignatureName,
            "cardBrand" => $this->cardBrand,
            "cardLast4" => $this->cardLast4,
            "partnerId" => $this->partnerId,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): BillingMethod {
        $model = new BillingMethod();
        $model->setBillingMethodId(isset($data["billingMethodId"]) ? $data["billingMethodId"] : null);
        $model->setAccountName(isset($data["accountName"]) ? $data["accountName"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMethodType(isset($data["methodType"]) ? $data["methodType"] : null);
        $model->setCardCustomerId(isset($data["cardCustomerId"]) ? $data["cardCustomerId"] : null);
        $model->setCardSignatureName(isset($data["cardSignatureName"]) ? $data["cardSignatureName"] : null);
        $model->setCardBrand(isset($data["cardBrand"]) ? $data["cardBrand"] : null);
        $model->setCardLast4(isset($data["cardLast4"]) ? $data["cardLast4"] : null);
        $model->setPartnerId(isset($data["partnerId"]) ? $data["partnerId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}