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
class DetachSecurityPolicyRequest extends Gs2BasicRequest {

    const FUNCTION = "DetachSecurityPolicy";

	/** @var string ユーザの名前 */
	private $userName;

	/** @var string セキュリティポリシーGRN */
	private $securityPolicyId;


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
	 * @return DetachSecurityPolicyRequest
	 */
	public function withUserName($userName): DetachSecurityPolicyRequest {
		$this->setUserName($userName);
		return $this;
	}

	/**
	 * セキュリティポリシーGRNを取得
	 *
	 * @return string セキュリティポリシーGRN
	 */
	public function getSecurityPolicyId() {
		return $this->securityPolicyId;
	}

	/**
	 * セキュリティポリシーGRNを設定
	 *
	 * @param string $securityPolicyId セキュリティポリシーGRN
	 */
	public function setSecurityPolicyId($securityPolicyId) {
		$this->securityPolicyId = $securityPolicyId;
	}

	/**
	 * セキュリティポリシーGRNを設定
	 *
	 * @param string $securityPolicyId セキュリティポリシーGRN
	 * @return DetachSecurityPolicyRequest
	 */
	public function withSecurityPolicyId($securityPolicyId): DetachSecurityPolicyRequest {
		$this->setSecurityPolicyId($securityPolicyId);
		return $this;
	}

}