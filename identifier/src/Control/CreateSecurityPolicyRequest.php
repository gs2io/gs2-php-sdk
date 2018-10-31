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
class CreateSecurityPolicyRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateSecurityPolicy";

	/** @var string 名前 */
	private $name;

	/** @var string ポリシードキュメント */
	private $policy;


	/**
	 * 名前を取得
	 *
	 * @return string 名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string $name 名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string $name 名前
	 * @return CreateSecurityPolicyRequest
	 */
	public function withName($name): CreateSecurityPolicyRequest {
		$this->setName($name);
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
	 * @return CreateSecurityPolicyRequest
	 */
	public function withPolicy($policy): CreateSecurityPolicyRequest {
		$this->setPolicy($policy);
		return $this;
	}

}