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
class DeleteWalletByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "DeleteWalletByUserId";

	/** @var string ゴールドプールの名前 */
	private $goldPoolName;

	/** @var string ゴールドの名前 */
	private $goldName;

	/** @var string ウォレット所有者のユーザID */
	private $userId;


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
	 * @return DeleteWalletByUserIdRequest
	 */
	public function withGoldPoolName($goldPoolName): DeleteWalletByUserIdRequest {
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
	 * @return DeleteWalletByUserIdRequest
	 */
	public function withGoldName($goldName): DeleteWalletByUserIdRequest {
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
	 * @return DeleteWalletByUserIdRequest
	 */
	public function withUserId($userId): DeleteWalletByUserIdRequest {
		$this->setUserId($userId);
		return $this;
	}

}