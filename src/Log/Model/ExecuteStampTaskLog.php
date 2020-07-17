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
 * スタンプタスク実行ログ
 *
 * @author Game Server Services, Inc.
 *
 */
class ExecuteStampTaskLog implements IModel {
	/**
     * @var int 日時
	 */
	protected $timestamp;

	/**
	 * 日時を取得
	 *
	 * @return int|null 日時
	 */
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}

	/**
	 * 日時を設定
	 *
	 * @param int|null $timestamp 日時
	 */
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}

	/**
	 * 日時を設定
	 *
	 * @param int|null $timestamp 日時
	 * @return ExecuteStampTaskLog $this
	 */
	public function withTimestamp(?int $timestamp): ExecuteStampTaskLog {
		$this->timestamp = $timestamp;
		return $this;
	}
	/**
     * @var string タスクID
	 */
	protected $taskId;

	/**
	 * タスクIDを取得
	 *
	 * @return string|null タスクID
	 */
	public function getTaskId(): ?string {
		return $this->taskId;
	}

	/**
	 * タスクIDを設定
	 *
	 * @param string|null $taskId タスクID
	 */
	public function setTaskId(?string $taskId) {
		$this->taskId = $taskId;
	}

	/**
	 * タスクIDを設定
	 *
	 * @param string|null $taskId タスクID
	 * @return ExecuteStampTaskLog $this
	 */
	public function withTaskId(?string $taskId): ExecuteStampTaskLog {
		$this->taskId = $taskId;
		return $this;
	}
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
	 * @return ExecuteStampTaskLog $this
	 */
	public function withService(?string $service): ExecuteStampTaskLog {
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
	 * @return ExecuteStampTaskLog $this
	 */
	public function withMethod(?string $method): ExecuteStampTaskLog {
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
	 * @return ExecuteStampTaskLog $this
	 */
	public function withUserId(?string $userId): ExecuteStampTaskLog {
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
	 * @return ExecuteStampTaskLog $this
	 */
	public function withAction(?string $action): ExecuteStampTaskLog {
		$this->action = $action;
		return $this;
	}
	/**
     * @var string 引数
	 */
	protected $args;

	/**
	 * 引数を取得
	 *
	 * @return string|null 引数
	 */
	public function getArgs(): ?string {
		return $this->args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string|null $args 引数
	 */
	public function setArgs(?string $args) {
		$this->args = $args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string|null $args 引数
	 * @return ExecuteStampTaskLog $this
	 */
	public function withArgs(?string $args): ExecuteStampTaskLog {
		$this->args = $args;
		return $this;
	}

    public function toJson(): array {
        return array(
            "timestamp" => $this->timestamp,
            "taskId" => $this->taskId,
            "service" => $this->service,
            "method" => $this->method,
            "userId" => $this->userId,
            "action" => $this->action,
            "args" => $this->args,
        );
    }

    public static function fromJson(array $data): ExecuteStampTaskLog {
        $model = new ExecuteStampTaskLog();
        $model->setTimestamp(isset($data["timestamp"]) ? $data["timestamp"] : null);
        $model->setTaskId(isset($data["taskId"]) ? $data["taskId"] : null);
        $model->setService(isset($data["service"]) ? $data["service"] : null);
        $model->setMethod(isset($data["method"]) ? $data["method"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setAction(isset($data["action"]) ? $data["action"] : null);
        $model->setArgs(isset($data["args"]) ? $data["args"] : null);
        return $model;
    }
}