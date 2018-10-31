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

namespace Gs2\Timer\Model;

/**
 * タイマー
 *
 * @author Game Server Services, Inc.
 *
 */
class Timer {

	/** @var string タイマーGRN */
	private $timerId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string タイマープールGRN */
	private $timerPoolId;

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

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/**
	 * タイマーGRNを取得
	 *
	 * @return string タイマーGRN
	 */
	public function getTimerId() {
		return $this->timerId;
	}

	/**
	 * タイマーGRNを設定
	 *
	 * @param string $timerId タイマーGRN
	 */
	public function setTimerId($timerId) {
		$this->timerId = $timerId;
	}

	/**
	 * タイマーGRNを設定
	 *
	 * @param string $timerId タイマーGRN
	 * @return self
	 */
	public function withTimerId($timerId): self {
		$this->setTimerId($timerId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
		return $this;
	}

	/**
	 * タイマープールGRNを取得
	 *
	 * @return string タイマープールGRN
	 */
	public function getTimerPoolId() {
		return $this->timerPoolId;
	}

	/**
	 * タイマープールGRNを設定
	 *
	 * @param string $timerPoolId タイマープールGRN
	 */
	public function setTimerPoolId($timerPoolId) {
		$this->timerPoolId = $timerPoolId;
	}

	/**
	 * タイマープールGRNを設定
	 *
	 * @param string $timerPoolId タイマープールGRN
	 * @return self
	 */
	public function withTimerPoolId($timerPoolId): self {
		$this->setTimerPoolId($timerPoolId);
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
	 * @return self
	 */
	public function withCallbackMethod($callbackMethod): self {
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
	 * @return self
	 */
	public function withCallbackUrl($callbackUrl): self {
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
	 * @return self
	 */
	public function withCallbackBody($callbackBody): self {
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
	 * @return self
	 */
	public function withExecuteTime($executeTime): self {
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
	 * @return self
	 */
	public function withRetryMax($retryMax): self {
		$this->setRetryMax($retryMax);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Timer
	 */
    static function build(array $array)
    {
        $item = new Timer();
        $item->setTimerId(isset($array['timerId']) ? $array['timerId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setTimerPoolId(isset($array['timerPoolId']) ? $array['timerPoolId'] : null);
        $item->setCallbackMethod(isset($array['callbackMethod']) ? $array['callbackMethod'] : null);
        $item->setCallbackUrl(isset($array['callbackUrl']) ? $array['callbackUrl'] : null);
        $item->setCallbackBody(isset($array['callbackBody']) ? $array['callbackBody'] : null);
        $item->setExecuteTime(isset($array['executeTime']) ? $array['executeTime'] : null);
        $item->setRetryMax(isset($array['retryMax']) ? $array['retryMax'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        return $item;
    }

}