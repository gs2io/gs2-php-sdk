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

namespace Gs2\Ranking2\Result;

use Gs2\Core\Model\IResult;
use Gs2\Ranking2\Model\SubscribeRankingModelMaster;

/**
 * Result of updateSubscribeRankingModelMaster: Update Subscribe Ranking Model Master
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#updatesubscriberankingmodelmaster
 */
class UpdateSubscribeRankingModelMasterResult implements IResult {
    /** @var SubscribeRankingModelMaster Subscribe Ranking Model Master updated */
    private $item;

    /** @return SubscribeRankingModelMaster|null Subscribe Ranking Model Master updated */
	public function getItem(): ?SubscribeRankingModelMaster {
		return $this->item;
	}

    /** @param SubscribeRankingModelMaster|null $item Subscribe Ranking Model Master updated */
	public function setItem(?SubscribeRankingModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param SubscribeRankingModelMaster|null $item Subscribe Ranking Model Master updated
     * @return UpdateSubscribeRankingModelMasterResult
     */
	public function withItem(?SubscribeRankingModelMaster $item): UpdateSubscribeRankingModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateSubscribeRankingModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateSubscribeRankingModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SubscribeRankingModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}