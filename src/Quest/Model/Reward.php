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

namespace Gs2\Quest\Model;

use Gs2\Core\Model\IModel;

/**
 * クリア報酬
 *
 * @author Game Server Services, Inc.
 *
 */
class Reward implements IModel {
	/**
     * @var string スタンプシートで実行するアクションの種類
	 */
	protected $action;

	/**
	 * スタンプシートで実行するアクションの種類を取得
	 *
	 * @return string|null スタンプシートで実行するアクションの種類
	 */
	public function getAction(): ?string {
		return $this->action;
	}

	/**
	 * スタンプシートで実行するアクションの種類を設定
	 *
	 * @param string|null $action スタンプシートで実行するアクションの種類
	 */
	public function setAction(?string $action) {
		$this->action = $action;
	}

	/**
	 * スタンプシートで実行するアクションの種類を設定
	 *
	 * @param string|null $action スタンプシートで実行するアクションの種類
	 * @return Reward $this
	 */
	public function withAction(?string $action): Reward {
		$this->action = $action;
		return $this;
	}
	/**
     * @var string リクエストモデル
	 */
	protected $request;

	/**
	 * リクエストモデルを取得
	 *
	 * @return string|null リクエストモデル
	 */
	public function getRequest(): ?string {
		return $this->request;
	}

	/**
	 * リクエストモデルを設定
	 *
	 * @param string|null $request リクエストモデル
	 */
	public function setRequest(?string $request) {
		$this->request = $request;
	}

	/**
	 * リクエストモデルを設定
	 *
	 * @param string|null $request リクエストモデル
	 * @return Reward $this
	 */
	public function withRequest(?string $request): Reward {
		$this->request = $request;
		return $this;
	}
	/**
     * @var string 入手するリソースGRN
	 */
	protected $itemId;

	/**
	 * 入手するリソースGRNを取得
	 *
	 * @return string|null 入手するリソースGRN
	 */
	public function getItemId(): ?string {
		return $this->itemId;
	}

	/**
	 * 入手するリソースGRNを設定
	 *
	 * @param string|null $itemId 入手するリソースGRN
	 */
	public function setItemId(?string $itemId) {
		$this->itemId = $itemId;
	}

	/**
	 * 入手するリソースGRNを設定
	 *
	 * @param string|null $itemId 入手するリソースGRN
	 * @return Reward $this
	 */
	public function withItemId(?string $itemId): Reward {
		$this->itemId = $itemId;
		return $this;
	}
	/**
     * @var int 入手する数量
	 */
	protected $value;

	/**
	 * 入手する数量を取得
	 *
	 * @return int|null 入手する数量
	 */
	public function getValue(): ?int {
		return $this->value;
	}

	/**
	 * 入手する数量を設定
	 *
	 * @param int|null $value 入手する数量
	 */
	public function setValue(?int $value) {
		$this->value = $value;
	}

	/**
	 * 入手する数量を設定
	 *
	 * @param int|null $value 入手する数量
	 * @return Reward $this
	 */
	public function withValue(?int $value): Reward {
		$this->value = $value;
		return $this;
	}

    public function toJson(): array {
        return array(
            "action" => $this->action,
            "request" => $this->request,
            "itemId" => $this->itemId,
            "value" => $this->value,
        );
    }

    public static function fromJson(array $data): Reward {
        $model = new Reward();
        $model->setAction(isset($data["action"]) ? $data["action"] : null);
        $model->setRequest(isset($data["request"]) ? $data["request"] : null);
        $model->setItemId(isset($data["itemId"]) ? $data["itemId"] : null);
        $model->setValue(isset($data["value"]) ? $data["value"] : null);
        return $model;
    }
}