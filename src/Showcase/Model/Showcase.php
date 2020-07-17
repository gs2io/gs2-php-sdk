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
 * 陳列棚
 *
 * @author Game Server Services, Inc.
 *
 */
class Showcase implements IModel {
	/**
     * @var string 陳列棚
	 */
	protected $showcaseId;

	/**
	 * 陳列棚を取得
	 *
	 * @return string|null 陳列棚
	 */
	public function getShowcaseId(): ?string {
		return $this->showcaseId;
	}

	/**
	 * 陳列棚を設定
	 *
	 * @param string|null $showcaseId 陳列棚
	 */
	public function setShowcaseId(?string $showcaseId) {
		$this->showcaseId = $showcaseId;
	}

	/**
	 * 陳列棚を設定
	 *
	 * @param string|null $showcaseId 陳列棚
	 * @return Showcase $this
	 */
	public function withShowcaseId(?string $showcaseId): Showcase {
		$this->showcaseId = $showcaseId;
		return $this;
	}
	/**
     * @var string 商品名
	 */
	protected $name;

	/**
	 * 商品名を取得
	 *
	 * @return string|null 商品名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 商品名を設定
	 *
	 * @param string|null $name 商品名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 商品名を設定
	 *
	 * @param string|null $name 商品名
	 * @return Showcase $this
	 */
	public function withName(?string $name): Showcase {
		$this->name = $name;
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
	 * @return Showcase $this
	 */
	public function withMetadata(?string $metadata): Showcase {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var DisplayItem[] インベントリに格納可能なアイテムモデル一覧
	 */
	protected $displayItems;

	/**
	 * インベントリに格納可能なアイテムモデル一覧を取得
	 *
	 * @return DisplayItem[]|null インベントリに格納可能なアイテムモデル一覧
	 */
	public function getDisplayItems(): ?array {
		return $this->displayItems;
	}

	/**
	 * インベントリに格納可能なアイテムモデル一覧を設定
	 *
	 * @param DisplayItem[]|null $displayItems インベントリに格納可能なアイテムモデル一覧
	 */
	public function setDisplayItems(?array $displayItems) {
		$this->displayItems = $displayItems;
	}

	/**
	 * インベントリに格納可能なアイテムモデル一覧を設定
	 *
	 * @param DisplayItem[]|null $displayItems インベントリに格納可能なアイテムモデル一覧
	 * @return Showcase $this
	 */
	public function withDisplayItems(?array $displayItems): Showcase {
		$this->displayItems = $displayItems;
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
	 * @return Showcase $this
	 */
	public function withSalesPeriodEventId(?string $salesPeriodEventId): Showcase {
		$this->salesPeriodEventId = $salesPeriodEventId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "showcaseId" => $this->showcaseId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "displayItems" => array_map(
                function (DisplayItem $v) {
                    return $v->toJson();
                },
                $this->displayItems == null ? [] : $this->displayItems
            ),
            "salesPeriodEventId" => $this->salesPeriodEventId,
        );
    }

    public static function fromJson(array $data): Showcase {
        $model = new Showcase();
        $model->setShowcaseId(isset($data["showcaseId"]) ? $data["showcaseId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDisplayItems(array_map(
                function ($v) {
                    return DisplayItem::fromJson($v);
                },
                isset($data["displayItems"]) ? $data["displayItems"] : []
            )
        );
        $model->setSalesPeriodEventId(isset($data["salesPeriodEventId"]) ? $data["salesPeriodEventId"] : null);
        return $model;
    }
}