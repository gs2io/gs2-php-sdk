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
 * 商品グループ
 *
 * @author Game Server Services, Inc.
 *
 */
class SalesItemGroup implements IModel {
	/**
     * @var string 商品グループ名
	 */
	protected $name;

	/**
	 * 商品グループ名を取得
	 *
	 * @return string|null 商品グループ名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 商品グループ名を設定
	 *
	 * @param string|null $name 商品グループ名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 商品グループ名を設定
	 *
	 * @param string|null $name 商品グループ名
	 * @return SalesItemGroup $this
	 */
	public function withName(?string $name): SalesItemGroup {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string メタデータ
	 */
	protected $metadata;

	/**
	 * メタデータを取得
	 *
	 * @return string|null メタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 * @return SalesItemGroup $this
	 */
	public function withMetadata(?string $metadata): SalesItemGroup {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var SalesItem[] 商品リスト
	 */
	protected $salesItems;

	/**
	 * 商品リストを取得
	 *
	 * @return SalesItem[]|null 商品リスト
	 */
	public function getSalesItems(): ?array {
		return $this->salesItems;
	}

	/**
	 * 商品リストを設定
	 *
	 * @param SalesItem[]|null $salesItems 商品リスト
	 */
	public function setSalesItems(?array $salesItems) {
		$this->salesItems = $salesItems;
	}

	/**
	 * 商品リストを設定
	 *
	 * @param SalesItem[]|null $salesItems 商品リスト
	 * @return SalesItemGroup $this
	 */
	public function withSalesItems(?array $salesItems): SalesItemGroup {
		$this->salesItems = $salesItems;
		return $this;
	}

    public function toJson(): array {
        return array(
            "name" => $this->name,
            "metadata" => $this->metadata,
            "salesItems" => array_map(
                function (SalesItem $v) {
                    return $v->toJson();
                },
                $this->salesItems == null ? [] : $this->salesItems
            ),
        );
    }

    public static function fromJson(array $data): SalesItemGroup {
        $model = new SalesItemGroup();
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setSalesItems(array_map(
                function ($v) {
                    return SalesItem::fromJson($v);
                },
                isset($data["salesItems"]) ? $data["salesItems"] : []
            )
        );
        return $model;
    }
}