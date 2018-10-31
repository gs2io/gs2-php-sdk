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
class AttachSecurityPolicyRequest extends Gs2BasicRequest {

    const FUNCTION = "AttachSecurityPolicy";

	/** @var string ユーザの名前を指定します。 */
	private $userName;

	/** @var string セキュリティポリシーのGRN */
	private $securityPolicyId;


	/**
	 * ユーザの名前を指定します。を取得
	 *
	 * @return string ユーザの名前を指定します。
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * ユーザの名前を指定します。を設定
	 *
	 * @param string $userName ユーザの名前を指定します。
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
	}

	/**
	 * ユーザの名前を指定します。を設定
	 *
	 * @param string $userName ユーザの名前を指定します。
	 * @return AttachSecurityPolicyRequest
	 */
	public function withUserName($userName): AttachSecurityPolicyRequest {
		$this->setUserName($userName);
		return $this;
	}

	/**
	 * セキュリティポリシーのGRNを取得
	 *
	 * @return string セキュリティポリシーのGRN
	 */
	public function getSecurityPolicyId() {
		return $this->securityPolicyId;
	}

	/**
	 * セキュリティポリシーのGRNを設定
	 *
	 * @param string $securityPolicyId セキュリティポリシーのGRN
	 */
	public function setSecurityPolicyId($securityPolicyId) {
		$this->securityPolicyId = $securityPolicyId;
	}

	/**
	 * セキュリティポリシーのGRNを設定
	 *
	 * @param string $securityPolicyId セキュリティポリシーのGRN
	 * @return AttachSecurityPolicyRequest
	 */
	public function withSecurityPolicyId($securityPolicyId): AttachSecurityPolicyRequest {
		$this->setSecurityPolicyId($securityPolicyId);
		return $this;
	}

}