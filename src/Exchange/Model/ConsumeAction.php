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

namespace Gs2\Exchange\Model;

use Gs2\Core\Model\IModel;

/**
 * 消費アクション
 *
 * @author Game Server Services, Inc.
 *
 */
class ConsumeAction implements IModel {
	/**
     * @var string スタンプタスクで実行するアクションの種類
	 */
	protected $action;

	/**
	 * スタンプタスクで実行するアクションの種類を取得
	 *
	 * @return string|null スタンプタスクで実行するアクションの種類
	 */
	public function getAction(): ?string {
		return $this->action;
	}

	/**
	 * スタンプタスクで実行するアクションの種類を設定
	 *
	 * @param string|null $action スタンプタスクで実行するアクションの種類
	 */
	public function setAction(?string $action) {
		$this->action = $action;
	}

	/**
	 * スタンプタスクで実行するアクションの種類を設定
	 *
	 * @param string|null $action スタンプタスクで実行するアクションの種類
	 * @return ConsumeAction $this
	 */
	public function withAction(?string $action): ConsumeAction {
		$this->action = $action;
		return $this;
	}
	/**
     * @var string 消費リクエストのJSON
	 */
	protected $request;

	/**
	 * 消費リクエストのJSONを取得
	 *
	 * @return string|null 消費リクエストのJSON
	 */
	public function getRequest(): ?string {
		return $this->request;
	}

	/**
	 * 消費リクエストのJSONを設定
	 *
	 * @param string|null $request 消費リクエストのJSON
	 */
	public function setRequest(?string $request) {
		$this->request = $request;
	}

	/**
	 * 消費リクエストのJSONを設定
	 *
	 * @param string|null $request 消費リクエストのJSON
	 * @return ConsumeAction $this
	 */
	public function withRequest(?string $request): ConsumeAction {
		$this->request = $request;
		return $this;
	}

    public function toJson(): array {
        return array(
            "action" => $this->action,
            "request" => $this->request,
        );
    }

    public static function fromJson(array $data): ConsumeAction {
        $model = new ConsumeAction();
        $model->setAction(isset($data["action"]) ? $data["action"] : null);
        $model->setRequest(isset($data["request"]) ? $data["request"] : null);
        return $model;
    }
}