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

namespace Gs2\Ranking\Result;

use Gs2\Core\Model\IResult;
use Gs2\Ranking\Model\Score;

/**
 * Result of putScoreByUserId: Register scores by User ID
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#putscorebyuserid
 */
class PutScoreByUserIdResult implements IResult {
    /** @var Score Registered Scores */
    private $item;

    /** @return Score|null Registered Scores */
	public function getItem(): ?Score {
		return $this->item;
	}

    /** @param Score|null $item Registered Scores */
	public function setItem(?Score $item) {
		$this->item = $item;
	}

    /**
     * @param Score|null $item Registered Scores
     * @return PutScoreByUserIdResult
     */
	public function withItem(?Score $item): PutScoreByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?PutScoreByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new PutScoreByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Score::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}