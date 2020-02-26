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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;

/**
 * スタンプシート実行ログ集計
 *
 * @author Game Server Services, Inc.
 *
 */
class ExecuteStampSheetLogCount implements IModel {
	/**
     * @var string マイクロサービスの種類
	 */
	protected $service;

	/**
	 * マイクロサービスの種類を取得
	 *
	 * @return string|null マイクロサービスの種類
	 */
	public function getService(): ?string {
		return $this->service;
	}

	/**
	 * マイクロサービスの種類を設定
	 *
	 * @param string|null $service マイクロサービスの種類
	 */
	public function setService(?string $service) {
		$this->service = $service;
	}

	/**
	 * マイクロサービスの種類を設定
	 *
	 * @param string|null $service マイクロサービスの種類
	 * @return ExecuteStampSheetLogCount $this
	 */
	public function withService(?string $service): ExecuteStampSheetLogCount {
		$this->service = $service;
		return $this;
	}
	/**
     * @var string マイクロサービスのメソッド
	 */
	protected $method;

	/**
	 * マイクロサービスのメソッドを取得
	 *
	 * @return string|null マイクロサービスのメソッド
	 */
	public function getMethod(): ?string {
		return $this->method;
	}

	/**
	 * マイクロサービスのメソッドを設定
	 *
	 * @param string|null $method マイクロサービスのメソッド
	 */
	public function setMethod(?string $method) {
		$this->method = $method;
	}

	/**
	 * マイクロサービスのメソッドを設定
	 *
	 * @param string|null $method マイクロサービスのメソッド
	 * @return ExecuteStampSheetLogCount $this
	 */
	public function withMethod(?string $method): ExecuteStampSheetLogCount {
		$this->method = $method;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return ExecuteStampSheetLogCount $this
	 */
	public function withUserId(?string $userId): ExecuteStampSheetLogCount {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string 報酬アクション
	 */
	protected $action;

	/**
	 * 報酬アクションを取得
	 *
	 * @return string|null 報酬アクション
	 */
	public function getAction(): ?string {
		return $this->action;
	}

	/**
	 * 報酬アクションを設定
	 *
	 * @param string|null $action 報酬アクション
	 */
	public function setAction(?string $action) {
		$this->action = $action;
	}

	/**
	 * 報酬アクションを設定
	 *
	 * @param string|null $action 報酬アクション
	 * @return ExecuteStampSheetLogCount $this
	 */
	public function withAction(?string $action): ExecuteStampSheetLogCount {
		$this->action = $action;
		return $this;
	}
	/**
     * @var int 回数
	 */
	protected $count;

	/**
	 * 回数を取得
	 *
	 * @return int|null 回数
	 */
	public function getCount(): ?int {
		return $this->count;
	}

	/**
	 * 回数を設定
	 *
	 * @param int|null $count 回数
	 */
	public function setCount(?int $count) {
		$this->count = $count;
	}

	/**
	 * 回数を設定
	 *
	 * @param int|null $count 回数
	 * @return ExecuteStampSheetLogCount $this
	 */
	public function withCount(?int $count): ExecuteStampSheetLogCount {
		$this->count = $count;
		return $this;
	}

    public function toJson(): array {
        return array(
            "service" => $this->service,
            "method" => $this->method,
            "userId" => $this->userId,
            "action" => $this->action,
            "count" => $this->count,
        );
    }

    public static function fromJson(array $data): ExecuteStampSheetLogCount {
        $model = new ExecuteStampSheetLogCount();
        $model->setService(isset($data["service"]) ? $data["service"] : null);
        $model->setMethod(isset($data["method"]) ? $data["method"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setAction(isset($data["action"]) ? $data["action"] : null);
        $model->setCount(isset($data["count"]) ? $data["count"] : null);
        return $model;
    }
}