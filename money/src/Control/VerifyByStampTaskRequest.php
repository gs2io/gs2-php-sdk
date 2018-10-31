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

namespace Gs2\Money\Control;

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class VerifyByStampTaskRequest extends Gs2UserRequest {

    const FUNCTION = "VerifyByStampTask";

	/** @var string スタンプタスク */
	private $task;

	/** @var string スタンプの暗号鍵 */
	private $keyName;

	/** @var string トランザクションID */
	private $transactionId;

	/** @var string レシートデータ */
	private $receipt;

	/** @var int スロット番号 */
	private $slot;


	/**
	 * スタンプタスクを取得
	 *
	 * @return string スタンプタスク
	 */
	public function getTask() {
		return $this->task;
	}

	/**
	 * スタンプタスクを設定
	 *
	 * @param string $task スタンプタスク
	 */
	public function setTask($task) {
		$this->task = $task;
	}

	/**
	 * スタンプタスクを設定
	 *
	 * @param string $task スタンプタスク
	 * @return VerifyByStampTaskRequest
	 */
	public function withTask($task): VerifyByStampTaskRequest {
		$this->setTask($task);
		return $this;
	}

	/**
	 * スタンプの暗号鍵を取得
	 *
	 * @return string スタンプの暗号鍵
	 */
	public function getKeyName() {
		return $this->keyName;
	}

	/**
	 * スタンプの暗号鍵を設定
	 *
	 * @param string $keyName スタンプの暗号鍵
	 */
	public function setKeyName($keyName) {
		$this->keyName = $keyName;
	}

	/**
	 * スタンプの暗号鍵を設定
	 *
	 * @param string $keyName スタンプの暗号鍵
	 * @return VerifyByStampTaskRequest
	 */
	public function withKeyName($keyName): VerifyByStampTaskRequest {
		$this->setKeyName($keyName);
		return $this;
	}

	/**
	 * トランザクションIDを取得
	 *
	 * @return string トランザクションID
	 */
	public function getTransactionId() {
		return $this->transactionId;
	}

	/**
	 * トランザクションIDを設定
	 *
	 * @param string $transactionId トランザクションID
	 */
	public function setTransactionId($transactionId) {
		$this->transactionId = $transactionId;
	}

	/**
	 * トランザクションIDを設定
	 *
	 * @param string $transactionId トランザクションID
	 * @return VerifyByStampTaskRequest
	 */
	public function withTransactionId($transactionId): VerifyByStampTaskRequest {
		$this->setTransactionId($transactionId);
		return $this;
	}

	/**
	 * レシートデータを取得
	 *
	 * @return string レシートデータ
	 */
	public function getReceipt() {
		return $this->receipt;
	}

	/**
	 * レシートデータを設定
	 *
	 * @param string $receipt レシートデータ
	 */
	public function setReceipt($receipt) {
		$this->receipt = $receipt;
	}

	/**
	 * レシートデータを設定
	 *
	 * @param string $receipt レシートデータ
	 * @return VerifyByStampTaskRequest
	 */
	public function withReceipt($receipt): VerifyByStampTaskRequest {
		$this->setReceipt($receipt);
		return $this;
	}

	/**
	 * スロット番号を取得
	 *
	 * @return int スロット番号
	 */
	public function getSlot() {
		return $this->slot;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int $slot スロット番号
	 */
	public function setSlot($slot) {
		$this->slot = $slot;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int $slot スロット番号
	 * @return VerifyByStampTaskRequest
	 */
	public function withSlot($slot): VerifyByStampTaskRequest {
		$this->setSlot($slot);
		return $this;
	}

}