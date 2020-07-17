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
 * 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class AttachSecurityPolicyResult implements IResult {
	/** @var SecurityPolicy[] 新しくユーザーに割り当てたセキュリティポリシーのリスト */
	private $items;

	/**
	 * 新しくユーザーに割り当てたセキュリティポリシーのリストを取得
	 *
	 * @return SecurityPolicy[]|null 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 新しくユーザーに割り当てたセキュリティポリシーのリストを設定
	 *
	 * @param SecurityPolicy[]|null $items 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): AttachSecurityPolicyResult {
        $result = new AttachSecurityPolicyResult();
        $result->setItems(array_map(
                function ($v) {
                    return SecurityPolicy::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $result;
    }
}