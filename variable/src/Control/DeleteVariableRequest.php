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

namespace Gs2\Variable\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DeleteVariableRequest extends Gs2BasicRequest {

    const FUNCTION = "DeleteVariable";

	/** @var string 変数のスコープとなるユーザID */
	private $userId;

	/** @var string 変数名 */
	private $variableName;


	/**
	 * 変数のスコープとなるユーザIDを取得
	 *
	 * @return string 変数のスコープとなるユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * 変数のスコープとなるユーザIDを設定
	 *
	 * @param string $userId 変数のスコープとなるユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * 変数のスコープとなるユーザIDを設定
	 *
	 * @param string $userId 変数のスコープとなるユーザID
	 * @return DeleteVariableRequest
	 */
	public function withUserId($userId): DeleteVariableRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 変数名を取得
	 *
	 * @return string 変数名
	 */
	public function getVariableName() {
		return $this->variableName;
	}

	/**
	 * 変数名を設定
	 *
	 * @param string $variableName 変数名
	 */
	public function setVariableName($variableName) {
		$this->variableName = $variableName;
	}

	/**
	 * 変数名を設定
	 *
	 * @param string $variableName 変数名
	 * @return DeleteVariableRequest
	 */
	public function withVariableName($variableName): DeleteVariableRequest {
		$this->setVariableName($variableName);
		return $this;
	}

}