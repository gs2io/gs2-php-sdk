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

namespace Gs2\Showcase\Model;

use Gs2\Core\Model\IModel;

/**
 * 陳列棚マスター
 *
 * @author Game Server Services, Inc.
 *
 */
class ShowcaseMaster implements IModel {
	/**
     * @var string 陳列棚マスター
	 */
	protected $showcaseId;

	/**
	 * 陳列棚マスターを取得
	 *
	 * @return string|null 陳列棚マスター
	 */
	public function getShowcaseId(): ?string {
		return $this->showcaseId;
	}

	/**
	 * 陳列棚マスターを設定
	 *
	 * @param string|null $showcaseId 陳列棚マスター
	 */
	public function setShowcaseId(?string $showcaseId) {
		$this->showcaseId = $showcaseId;
	}

	/**
	 * 陳列棚マスターを設定
	 *
	 * @param string|null $showcaseId 陳列棚マスター
	 * @return ShowcaseMaster $this
	 */
	public function withShowcaseId(?string $showcaseId): ShowcaseMaster {
		$this->showcaseId = $showcaseId;
		return $this;
	}
	/**
     * @var string 陳列棚名
	 */
	protected $name;

	/**
	 * 陳列棚名を取得
	 *
	 * @return string|null 陳列棚名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 陳列棚名を設定
	 *
	 * @param string|null $name 陳列棚名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 陳列棚名を設定
	 *
	 * @param string|null $name 陳列棚名
	 * @return ShowcaseMaster $this
	 */
	public function withName(?string $name): ShowcaseMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 陳列棚マスターの説明
	 */
	protected $description;

	/**
	 * 陳列棚マスターの説明を取得
	 *
	 * @return string|null 陳列棚マスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 陳列棚マスターの説明を設定
	 *
	 * @param string|null $description 陳列棚マスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 陳列棚マスターの説明を設定
	 *
	 * @param string|null $description 陳列棚マスターの説明
	 * @return ShowcaseMaster $this
	 */
	public function withDescription(?string $description): ShowcaseMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 商品のメタデータ
	 */
	protected $metadata;

	/**
	 * 商品のメタデータを取得
	 *
	 * @return string|null 商品のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 商品のメタデータを設定
	 *
	 * @param string|null $metadata 商品のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 商品のメタデータを設定
	 *
	 * @param string|null $metadata 商品のメタデータ
	 * @return ShowcaseMaster $this
	 */
	public function withMetadata(?string $metadata): ShowcaseMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string 販売期間とするイベントマスター のGRN
	 */
	protected $salesPeriodEventId;

	/**
	 * 販売期間とするイベントマスター のGRNを取得
	 *
	 * @return string|null 販売期間とするイベントマスター のGRN
	 */
	public function getSalesPeriodEventId(): ?string {
		return $this->salesPeriodEventId;
	}

	/**
	 * 販売期間とするイベントマスター のGRNを設定
	 *
	 * @param string|null $salesPeriodEventId 販売期間とするイベントマスター のGRN
	 */
	public function setSalesPeriodEventId(?string $salesPeriodEventId) {
		$this->salesPeriodEventId = $salesPeriodEventId;
	}

	/**
	 * 販売期間とするイベントマスター のGRNを設定
	 *
	 * @param string|null $salesPeriodEventId 販売期間とするイベントマスター のGRN
	 * @return ShowcaseMaster $this
	 */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): ShowcaseMaster {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}
	/**
     * @var DisplayItemMaster[] 陳列する商品モデル一覧
	 */
	protected $displayItems;

	/**
	 * 陳列する商品モデル一覧を取得
	 *
	 * @return DisplayItemMaster[]|null 陳列する商品モデル一覧
	 */
	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}

	/**
	 * 陳列する商品モデル一覧を設定
	 *
	 * @param DisplayItemMaster[]|null $displayItems 陳列する商品モデル一覧
	 */
	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}

	/**
	 * 陳列する商品モデル一覧を設定
	 *
	 * @param DisplayItemMaster[]|null $displayItems 陳列する商品モデル一覧
	 * @return ShowcaseMaster $this
	 */
	public function withDisplayItems(?array $displayItems): ShowcaseMaster {
		$this->displayItems = $displayItems;
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
	 * @return ShowcaseMaster $this
	 */
	public function withCreatedAt(?int $createdAt): ShowcaseMaster {
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
	 * @return ShowcaseMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): ShowcaseMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "showcaseId" => $this->showcaseId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "salesPeriodEventId" => $this->salesPeriodEventId,
            "displayItems" => array_map(
                function (DisplayItemMaster $v) {
                    return $v->toJson();
                },
                $this->displayItems == null ? [] : $this->displayItems
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): ShowcaseMaster {
        $model = new ShowcaseMaster();
        $model->setShowcaseId(isset($data["showcaseId"]) ? $data["showcaseId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setSalesPeriodEventId(isset($data["salesPeriodEventId"]) ? $data["salesPeriodEventId"] : null);
        $model->setDisplayItems(array_map(
                function ($v) {
                    return DisplayItemMaster::fromJson($v);
                },
                isset($data["displayItems"]) ? $data["displayItems"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}