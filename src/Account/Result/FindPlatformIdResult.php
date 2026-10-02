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

namespace Gs2\Account\Result;

use Gs2\Core\Model\IResult;
use Gs2\Account\Model\PlatformUser;

/**
 * Result of findPlatformId: Find GS2-Account user ID by specifying External Platform Account ID
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#findplatformid
 */
class FindPlatformIdResult implements IResult {
    /** @var PlatformUser External Platform User Information */
    private $item;

    /** @return PlatformUser|null External Platform User Information */
	public function getItem(): ?PlatformUser {
		return $this->item;
	}

    /** @param PlatformUser|null $item External Platform User Information */
	public function setItem(?PlatformUser $item) {
		$this->item = $item;
	}

    /**
     * @param PlatformUser|null $item External Platform User Information
     * @return FindPlatformIdResult
     */
	public function withItem(?PlatformUser $item): FindPlatformIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?FindPlatformIdResult {
        if ($data === null) {
            return null;
        }
        return (new FindPlatformIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? PlatformUser::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}