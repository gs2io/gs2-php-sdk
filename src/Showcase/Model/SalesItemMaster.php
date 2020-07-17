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
 * 商品マスター
 *
 * @author Game Server Services, Inc.
 *
 */
class SalesItemMaster implements IModel {
	/**
     * @var string 商品マスター
	 */
	protected $salesItemId;

	/**
	 * 商品マスターを取得
	 *
	 * @return string|null 商品マスター
	 */
	public function getSalesItemId(): ?string {
		return $this->salesItemId;
	}

	/**
	 * 商品マスターを設定
	 *
	 * @param string|null $salesItemId 商品マスター
	 */
	public function setSalesItemId(?string $salesItemId) {
		$this->salesItemId = $salesItemId;
	}

	/**
	 * 商品マスターを設定
	 *
	 * @param string|null $salesItemId 商品マスター
	 * @return SalesItemMaster $this
	 */
	public function withSalesItemId(?string $salesItemId): SalesItemMaster {
		$this->salesItemId = $salesItemId;
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
	 * @return SalesItemMaster $this
	 */
	public function withName(?string $name): SalesItemMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 商品マスターの説明
	 */
	protected $description;

	/**
	 * 商品マスターの説明を取得
	 *
	 * @return string|null 商品マスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 商品マスターの説明を設定
	 *
	 * @param string|null $description 商品マスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 商品マスターの説明を設定
	 *
	 * @param string|null $description 商品マスターの説明
	 * @return SalesItemMaster $this
	 */
	public function withDescription(?string $description): SalesItemMaster {
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
	 * @return SalesItemMaster $this
	 */
	public function withMetadata(?string $metadata): SalesItemMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var ConsumeAction[] 消費アクションリスト
	 */
	protected $consumeActions;

	/**
	 * 消費アクションリストを取得
	 *
	 * @return ConsumeAction[]|null 消費アクションリスト
	 */
	public function getConsumeActions(): ?array {
		return $this->consumeActions;
	}

	/**
	 * 消費アクションリストを設定
	 *
	 * @param ConsumeAction[]|null $consumeActions 消費アクションリスト
	 */
	public function setConsumeActions(?array $consumeActions) {
		$this->consumeActions = $consumeActions;
	}

	/**
	 * 消費アクションリストを設定
	 *
	 * @param ConsumeAction[]|null $consumeActions 消費アクションリスト
	 * @return SalesItemMaster $this
	 */
	public function withConsumeActions(?array $consumeActions): SalesItemMaster {
		$this->consumeActions = $consumeActions;
		return $this;
	}
	/**
     * @var AcquireAction[] 入手アクションリスト
	 */
	protected $acquireActions;

	/**
	 * 入手アクションリストを取得
	 *
	 * @return AcquireAction[]|null 入手アクションリスト
	 */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}

	/**
	 * 入手アクションリストを設定
	 *
	 * @param AcquireAction[]|null $acquireActions 入手アクションリスト
	 */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}

	/**
	 * 入手アクションリストを設定
	 *
	 * @param AcquireAction[]|null $acquireActions 入手アクションリスト
	 * @return SalesItemMaster $this
	 */
	public function withAcquireActions(?array $acquireActions): SalesItemMaster {
		$this->acquireActions = $acquireActions;
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
	 * @return SalesItemMaster $this
	 */
	public function withCreatedAt(?int $createdAt): SalesItemMaster {
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
	 * @return SalesItemMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): SalesItemMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "salesItemId" => $this->salesItemId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "consumeActions" => array_map(
                function (ConsumeAction $v) {
                    return $v->toJson();
                },
                $this->consumeActions == null ? [] : $this->consumeActions
            ),
            "acquireActions" => array_map(
                function (AcquireAction $v) {
                    return $v->toJson();
                },
                $this->acquireActions == null ? [] : $this->acquireActions
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): SalesItemMaster {
        $model = new SalesItemMaster();
        $model->setSalesItemId(isset($data["salesItemId"]) ? $data["salesItemId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setConsumeActions(array_map(
                function ($v) {
                    return ConsumeAction::fromJson($v);
                },
                isset($data["consumeActions"]) ? $data["consumeActions"] : []
            )
        );
        $model->setAcquireActions(array_map(
                function ($v) {
                    return AcquireAction::fromJson($v);
                },
                isset($data["acquireActions"]) ? $data["acquireActions"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}