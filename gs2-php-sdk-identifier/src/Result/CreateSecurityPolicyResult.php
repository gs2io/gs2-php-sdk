<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Identifier\Result;

use Gs2\Core\Model\IResult;
use Gs2\Identifier\Model\SecurityPolicy;

/**
 * セキュリティポリシーを新規作成します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateSecurityPolicyResult implements IResult {
	/** @var SecurityPolicy 作成したセキュリティポリシー */
	private $item;

	/**
	 * 作成したセキュリティポリシーを取得
	 *
	 * @return SecurityPolicy|null セキュリティポリシーを新規作成します
	 */
	public function getItem(): ?SecurityPolicy {
		return $this->item;
	}

	/**
	 * 作成したセキュリティポリシーを設定
	 *
	 * @param SecurityPolicy|null $item セキュリティポリシーを新規作成します
	 */
	public function setItem(?SecurityPolicy $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateSecurityPolicyResult {
        $result = new CreateSecurityPolicyResult();
        $result->setItem(isset($data["item"]) ? SecurityPolicy::fromJson($data["item"]) : null);
        return $result;
    }
}