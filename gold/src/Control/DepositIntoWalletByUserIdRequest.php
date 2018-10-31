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

namespace Gs2\Gold\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DepositIntoWalletByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "DepositIntoWalletByUserId";

	/** @var string ゴールドプールの名前 */
	private $goldPoolName;

	/** @var string ゴールドの名前 */
	private $goldName;

	/** @var string ウォレット所有者のユーザID */
	private $userId;

	/** @var long 加算量 */
	private $value;

	/** @var string コンテキスト */
	private $context;


	/**
	 * ゴールドプールの名前を取得
	 *
	 * @return string ゴールドプールの名前
	 */
	public function getGoldPoolName() {
		return $this->goldPoolName;
	}

	/**
	 * ゴールドプールの名前を設定
	 *
	 * @param string $goldPoolName ゴールドプールの名前
	 */
	public function setGoldPoolName($goldPoolName) {
		$this->goldPoolName = $goldPoolName;
	}

	/**
	 * ゴールドプールの名前を設定
	 *
	 * @param string $goldPoolName ゴールドプールの名前
	 * @return DepositIntoWalletByUserIdRequest
	 */
	public function withGoldPoolName($goldPoolName): DepositIntoWalletByUserIdRequest {
		$this->setGoldPoolName($goldPoolName);
		return $this;
	}

	/**
	 * ゴールドの名前を取得
	 *
	 * @return string ゴールドの名前
	 */
	public function getGoldName() {
		return $this->goldName;
	}

	/**
	 * ゴールドの名前を設定
	 *
	 * @param string $goldName ゴールドの名前
	 */
	public function setGoldName($goldName) {
		$this->goldName = $goldName;
	}

	/**
	 * ゴールドの名前を設定
	 *
	 * @param string $goldName ゴールドの名前
	 * @return DepositIntoWalletByUserIdRequest
	 */
	public function withGoldName($goldName): DepositIntoWalletByUserIdRequest {
		$this->setGoldName($goldName);
		return $this;
	}

	/**
	 * ウォレット所有者のユーザIDを取得
	 *
	 * @return string ウォレット所有者のユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ウォレット所有者のユーザIDを設定
	 *
	 * @param string $userId ウォレット所有者のユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ウォレット所有者のユーザIDを設定
	 *
	 * @param string $userId ウォレット所有者のユーザID
	 * @return DepositIntoWalletByUserIdRequest
	 */
	public function withUserId($userId): DepositIntoWalletByUserIdRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 加算量を取得
	 *
	 * @return long 加算量
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * 加算量を設定
	 *
	 * @param long $value 加算量
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * 加算量を設定
	 *
	 * @param long $value 加算量
	 * @return DepositIntoWalletByUserIdRequest
	 */
	public function withValue($value): DepositIntoWalletByUserIdRequest {
		$this->setValue($value);
		return $this;
	}

	/**
	 * コンテキストを取得
	 *
	 * @return string コンテキスト
	 */
	public function getContext() {
		return $this->context;
	}

	/**
	 * コンテキストを設定
	 *
	 * @param string $context コンテキスト
	 */
	public function setContext($context) {
		$this->context = $context;
	}

	/**
	 * コンテキストを設定
	 *
	 * @param string $context コンテキスト
	 * @return DepositIntoWalletByUserIdRequest
	 */
	public function withContext($context): DepositIntoWalletByUserIdRequest {
		$this->setContext($context);
		return $this;
	}

}