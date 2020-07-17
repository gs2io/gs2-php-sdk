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
 * アクセスログ
 *
 * @author Game Server Services, Inc.
 *
 */
class AccessLog implements IModel {
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
	 * @return AccessLog $this
	 */
	public function withTimestamp(?int $timestamp): AccessLog {
		$this->timestamp = $timestamp;
		return $this;
	}
	/**
     * @var string リクエストID
	 */
	protected $requestId;

	/**
	 * リクエストIDを取得
	 *
	 * @return string|null リクエストID
	 */
	public function getRequestId(): ?string {
		return $this->requestId;
	}

	/**
	 * リクエストIDを設定
	 *
	 * @param string|null $requestId リクエストID
	 */
	public function setRequestId(?string $requestId) {
		$this->requestId = $requestId;
	}

	/**
	 * リクエストIDを設定
	 *
	 * @param string|null $requestId リクエストID
	 * @return AccessLog $this
	 */
	public function withRequestId(?string $requestId): AccessLog {
		$this->requestId = $requestId;
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
	 * @return AccessLog $this
	 */
	public function withService(?string $service): AccessLog {
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
	 * @return AccessLog $this
	 */
	public function withMethod(?string $method): AccessLog {
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
	 * @return AccessLog $this
	 */
	public function withUserId(?string $userId): AccessLog {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string リクエストパラメータ
	 */
	protected $request;

	/**
	 * リクエストパラメータを取得
	 *
	 * @return string|null リクエストパラメータ
	 */
	public function getRequest(): ?string {
		return $this->request;
	}

	/**
	 * リクエストパラメータを設定
	 *
	 * @param string|null $request リクエストパラメータ
	 */
	public function setRequest(?string $request) {
		$this->request = $request;
	}

	/**
	 * リクエストパラメータを設定
	 *
	 * @param string|null $request リクエストパラメータ
	 * @return AccessLog $this
	 */
	public function withRequest(?string $request): AccessLog {
		$this->request = $request;
		return $this;
	}
	/**
     * @var string 応答内容
	 */
	protected $result;

	/**
	 * 応答内容を取得
	 *
	 * @return string|null 応答内容
	 */
	public function getResult(): ?string {
		return $this->result;
	}

	/**
	 * 応答内容を設定
	 *
	 * @param string|null $result 応答内容
	 */
	public function setResult(?string $result) {
		$this->result = $result;
	}

	/**
	 * 応答内容を設定
	 *
	 * @param string|null $result 応答内容
	 * @return AccessLog $this
	 */
	public function withResult(?string $result): AccessLog {
		$this->result = $result;
		return $this;
	}

    public function toJson(): array {
        return array(
            "timestamp" => $this->timestamp,
            "requestId" => $this->requestId,
            "service" => $this->service,
            "method" => $this->method,
            "userId" => $this->userId,
            "request" => $this->request,
            "result" => $this->result,
        );
    }

    public static function fromJson(array $data): AccessLog {
        $model = new AccessLog();
        $model->setTimestamp(isset($data["timestamp"]) ? $data["timestamp"] : null);
        $model->setRequestId(isset($data["requestId"]) ? $data["requestId"] : null);
        $model->setService(isset($data["service"]) ? $data["service"] : null);
        $model->setMethod(isset($data["method"]) ? $data["method"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setRequest(isset($data["request"]) ? $data["request"] : null);
        $model->setResult(isset($data["result"]) ? $data["result"] : null);
        return $model;
    }
}