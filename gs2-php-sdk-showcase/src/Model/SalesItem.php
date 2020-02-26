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
 * 商品
 *
 * @author Game Server Services, Inc.
 *
 */
class SalesItem implements IModel {
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
	 * @return SalesItem $this
	 */
	public function withName(?string $name): SalesItem {
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
	 * @return SalesItem $this
	 */
	public function withMetadata(?string $metadata): SalesItem {
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
	 * @return SalesItem $this
	 */
	public function withConsumeActions(?array $consumeActions): SalesItem {
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
	 * @return SalesItem $this
	 */
	public function withAcquireActions(?array $acquireActions): SalesItem {
		$this->acquireActions = $acquireActions;
		return $this;
	}

    public function toJson(): array {
        return array(
            "name" => $this->name,
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
        );
    }

    public static function fromJson(array $data): SalesItem {
        $model = new SalesItem();
        $model->setName(isset($data["name"]) ? $data["name"] : null);
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
        return $model;
    }
}