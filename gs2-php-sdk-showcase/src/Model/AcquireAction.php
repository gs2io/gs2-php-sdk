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
 * 入手アクション
 *
 * @author Game Server Services, Inc.
 *
 */
class AcquireAction implements IModel {
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
	 * @return AcquireAction $this
	 */
	public function withAction(?string $action): AcquireAction {
		$this->action = $action;
		return $this;
	}
	/**
     * @var string 入手リクエストのJSON
	 */
	protected $request;

	/**
	 * 入手リクエストのJSONを取得
	 *
	 * @return string|null 入手リクエストのJSON
	 */
	public function getRequest(): ?string {
		return $this->request;
	}

	/**
	 * 入手リクエストのJSONを設定
	 *
	 * @param string|null $request 入手リクエストのJSON
	 */
	public function setRequest(?string $request) {
		$this->request = $request;
	}

	/**
	 * 入手リクエストのJSONを設定
	 *
	 * @param string|null $request 入手リクエストのJSON
	 * @return AcquireAction $this
	 */
	public function withRequest(?string $request): AcquireAction {
		$this->request = $request;
		return $this;
	}

    public function toJson(): array {
        return array(
            "action" => $this->action,
            "request" => $this->request,
        );
    }

    public static function fromJson(array $data): AcquireAction {
        $model = new AcquireAction();
        $model->setAction(isset($data["action"]) ? $data["action"] : null);
        $model->setRequest(isset($data["request"]) ? $data["request"] : null);
        return $model;
    }
}