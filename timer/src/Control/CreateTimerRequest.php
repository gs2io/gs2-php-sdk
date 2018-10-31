<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Timer\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateTimerRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateTimer";

	/** @var string タイマープールの名前を指定します。 */
	private $timerPoolName;

	/** @var string コールバックHTTPメソッド */
	private $callbackMethod;

	/** @var string コールバックURL */
	private $callbackUrl;

	/** @var string コールバックボディ(PUT/POSTのときのみ有効) */
	private $callbackBody;

	/** @var int コールバック時間(エポック秒) */
	private $executeTime;

	/** @var int 最大リトライ回数 */
	private $retryMax;


	/**
	 * タイマープールの名前を指定します。を取得
	 *
	 * @return string タイマープールの名前を指定します。
	 */
	public function getTimerPoolName() {
		return $this->timerPoolName;
	}

	/**
	 * タイマープールの名前を指定します。を設定
	 *
	 * @param string $timerPoolName タイマープールの名前を指定します。
	 */
	public function setTimerPoolName($timerPoolName) {
		$this->timerPoolName = $timerPoolName;
	}

	/**
	 * タイマープールの名前を指定します。を設定
	 *
	 * @param string $timerPoolName タイマープールの名前を指定します。
	 * @return CreateTimerRequest
	 */
	public function withTimerPoolName($timerPoolName): CreateTimerRequest {
		$this->setTimerPoolName($timerPoolName);
		return $this;
	}

	/**
	 * コールバックHTTPメソッドを取得
	 *
	 * @return string コールバックHTTPメソッド
	 */
	public function getCallbackMethod() {
		return $this->callbackMethod;
	}

	/**
	 * コールバックHTTPメソッドを設定
	 *
	 * @param string $callbackMethod コールバックHTTPメソッド
	 */
	public function setCallbackMethod($callbackMethod) {
		$this->callbackMethod = $callbackMethod;
	}

	/**
	 * コールバックHTTPメソッドを設定
	 *
	 * @param string $callbackMethod コールバックHTTPメソッド
	 * @return CreateTimerRequest
	 */
	public function withCallbackMethod($callbackMethod): CreateTimerRequest {
		$this->setCallbackMethod($callbackMethod);
		return $this;
	}

	/**
	 * コールバックURLを取得
	 *
	 * @return string コールバックURL
	 */
	public function getCallbackUrl() {
		return $this->callbackUrl;
	}

	/**
	 * コールバックURLを設定
	 *
	 * @param string $callbackUrl コールバックURL
	 */
	public function setCallbackUrl($callbackUrl) {
		$this->callbackUrl = $callbackUrl;
	}

	/**
	 * コールバックURLを設定
	 *
	 * @param string $callbackUrl コールバックURL
	 * @return CreateTimerRequest
	 */
	public function withCallbackUrl($callbackUrl): CreateTimerRequest {
		$this->setCallbackUrl($callbackUrl);
		return $this;
	}

	/**
	 * コールバックボディ(PUT/POSTのときのみ有効)を取得
	 *
	 * @return string コールバックボディ(PUT/POSTのときのみ有効)
	 */
	public function getCallbackBody() {
		return $this->callbackBody;
	}

	/**
	 * コールバックボディ(PUT/POSTのときのみ有効)を設定
	 *
	 * @param string $callbackBody コールバックボディ(PUT/POSTのときのみ有効)
	 */
	public function setCallbackBody($callbackBody) {
		$this->callbackBody = $callbackBody;
	}

	/**
	 * コールバックボディ(PUT/POSTのときのみ有効)を設定
	 *
	 * @param string $callbackBody コールバックボディ(PUT/POSTのときのみ有効)
	 * @return CreateTimerRequest
	 */
	public function withCallbackBody($callbackBody): CreateTimerRequest {
		$this->setCallbackBody($callbackBody);
		return $this;
	}

	/**
	 * コールバック時間(エポック秒)を取得
	 *
	 * @return int コールバック時間(エポック秒)
	 */
	public function getExecuteTime() {
		return $this->executeTime;
	}

	/**
	 * コールバック時間(エポック秒)を設定
	 *
	 * @param int $executeTime コールバック時間(エポック秒)
	 */
	public function setExecuteTime($executeTime) {
		$this->executeTime = $executeTime;
	}

	/**
	 * コールバック時間(エポック秒)を設定
	 *
	 * @param int $executeTime コールバック時間(エポック秒)
	 * @return CreateTimerRequest
	 */
	public function withExecuteTime($executeTime): CreateTimerRequest {
		$this->setExecuteTime($executeTime);
		return $this;
	}

	/**
	 * 最大リトライ回数を取得
	 *
	 * @return int 最大リトライ回数
	 */
	public function getRetryMax() {
		return $this->retryMax;
	}

	/**
	 * 最大リトライ回数を設定
	 *
	 * @param int $retryMax 最大リトライ回数
	 */
	public function setRetryMax($retryMax) {
		$this->retryMax = $retryMax;
	}

	/**
	 * 最大リトライ回数を設定
	 *
	 * @param int $retryMax 最大リトライ回数
	 * @return CreateTimerRequest
	 */
	public function withRetryMax($retryMax): CreateTimerRequest {
		$this->setRetryMax($retryMax);
		return $this;
	}

}