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
class UpdateSecurityPolicyRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateSecurityPolicy";

	/** @var string セキュリティポリシーの名前を指定します。 */
	private $securityPolicyName;

	/** @var string ポリシードキュメント */
	private $policy;


	/**
	 * セキュリティポリシーの名前を指定します。を取得
	 *
	 * @return string セキュリティポリシーの名前を指定します。
	 */
	public function getSecurityPolicyName() {
		return $this->securityPolicyName;
	}

	/**
	 * セキュリティポリシーの名前を指定します。を設定
	 *
	 * @param string $securityPolicyName セキュリティポリシーの名前を指定します。
	 */
	public function setSecurityPolicyName($securityPolicyName) {
		$this->securityPolicyName = $securityPolicyName;
	}

	/**
	 * セキュリティポリシーの名前を指定します。を設定
	 *
	 * @param string $securityPolicyName セキュリティポリシーの名前を指定します。
	 * @return UpdateSecurityPolicyRequest
	 */
	public function withSecurityPolicyName($securityPolicyName): UpdateSecurityPolicyRequest {
		$this->setSecurityPolicyName($securityPolicyName);
		return $this;
	}

	/**
	 * ポリシードキュメントを取得
	 *
	 * @return string ポリシードキュメント
	 */
	public function getPolicy() {
		return $this->policy;
	}

	/**
	 * ポリシードキュメントを設定
	 *
	 * @param string $policy ポリシードキュメント
	 */
	public function setPolicy($policy) {
		$this->policy = $policy;
	}

	/**
	 * ポリシードキュメントを設定
	 *
	 * @param string $policy ポリシードキュメント
	 * @return UpdateSecurityPolicyRequest
	 */
	public function withPolicy($policy): UpdateSecurityPolicyRequest {
		$this->setPolicy($policy);
		return $this;
	}

}