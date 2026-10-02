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

namespace Gs2\Distributor\Result;

use Gs2\Core\Model\IResult;

/**
 * Result of freezeMasterDataByUserId: Freeze master data at the current time by User ID
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#freezemasterdatabyuserid
 */
class FreezeMasterDataByUserIdResult implements IResult {
    /** @var string Context recording the time at which master data is fixed */
    private $newContextStack;

    /** @return string|null Context recording the time at which master data is fixed */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the time at which master data is fixed */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the time at which master data is fixed
     * @return FreezeMasterDataByUserIdResult
     */
	public function withNewContextStack(?string $newContextStack): FreezeMasterDataByUserIdResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?FreezeMasterDataByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new FreezeMasterDataByUserIdResult())
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}