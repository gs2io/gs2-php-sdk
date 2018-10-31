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

namespace Gs2\Identifier\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DeleteUserRequest extends Gs2BasicRequest {

    const FUNCTION = "DeleteUser";

	/** @var string ユーザの名前 */
	private $userName;


	/**
	 * ユーザの名前を取得
	 *
	 * @return string ユーザの名前
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * ユーザの名前を設定
	 *
	 * @param string $userName ユーザの名前
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
	}

	/**
	 * ユーザの名前を設定
	 *
	 * @param string $userName ユーザの名前
	 * @return DeleteUserRequest
	 */
	public function withUserName($userName): DeleteUserRequest {
		$this->setUserName($userName);
		return $this;
	}

}