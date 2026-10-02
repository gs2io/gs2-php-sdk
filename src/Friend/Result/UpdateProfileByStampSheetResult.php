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

namespace Gs2\Friend\Result;

use Gs2\Core\Model\IResult;
use Gs2\Friend\Model\Profile;

/**
 * Result of updateProfileByStampSheet: Update profile via transaction
 *
 * @see https://docs.gs2.io/api_reference/friend/stamp_sheet/#gs2friendupdateprofilebyuserid
 */
class UpdateProfileByStampSheetResult implements IResult {
    /** @var Profile Profile updated */
    private $item;

    /** @return Profile|null Profile updated */
	public function getItem(): ?Profile {
		return $this->item;
	}

    /** @param Profile|null $item Profile updated */
	public function setItem(?Profile $item) {
		$this->item = $item;
	}

    /**
     * @param Profile|null $item Profile updated
     * @return UpdateProfileByStampSheetResult
     */
	public function withItem(?Profile $item): UpdateProfileByStampSheetResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateProfileByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateProfileByStampSheetResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Profile::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}