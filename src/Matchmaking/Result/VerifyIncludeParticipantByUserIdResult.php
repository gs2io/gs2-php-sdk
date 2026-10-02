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

namespace Gs2\Matchmaking\Result;

use Gs2\Core\Model\IResult;
use Gs2\Matchmaking\Model\SeasonGathering;

/**
 * Result of verifyIncludeParticipantByUserId: Verify if persistent gathering includes user ID by User ID
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#verifyincludeparticipantbyuserid
 */
class VerifyIncludeParticipantByUserIdResult implements IResult {
    /** @var SeasonGathering SeasonGathering */
    private $item;

    /** @return SeasonGathering|null SeasonGathering */
	public function getItem(): ?SeasonGathering {
		return $this->item;
	}

    /** @param SeasonGathering|null $item SeasonGathering */
	public function setItem(?SeasonGathering $item) {
		$this->item = $item;
	}

    /**
     * @param SeasonGathering|null $item SeasonGathering
     * @return VerifyIncludeParticipantByUserIdResult
     */
	public function withItem(?SeasonGathering $item): VerifyIncludeParticipantByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyIncludeParticipantByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyIncludeParticipantByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SeasonGathering::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}