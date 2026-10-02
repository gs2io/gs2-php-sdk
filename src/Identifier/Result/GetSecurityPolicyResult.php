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
 * Result of getSecurityPolicy: Get Security Policy
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#getsecuritypolicy
 */
class GetSecurityPolicyResult implements IResult {
    /** @var SecurityPolicy Security Policy */
    private $item;

    /** @return SecurityPolicy|null Security Policy */
	public function getItem(): ?SecurityPolicy {
		return $this->item;
	}

    /** @param SecurityPolicy|null $item Security Policy */
	public function setItem(?SecurityPolicy $item) {
		$this->item = $item;
	}

    /**
     * @param SecurityPolicy|null $item Security Policy
     * @return GetSecurityPolicyResult
     */
	public function withItem(?SecurityPolicy $item): GetSecurityPolicyResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSecurityPolicyResult {
        if ($data === null) {
            return null;
        }
        return (new GetSecurityPolicyResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SecurityPolicy::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}