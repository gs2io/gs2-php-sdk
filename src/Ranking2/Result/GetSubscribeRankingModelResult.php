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
use Gs2\Ranking2\Model\SubscribeRankingModel;

/**
 * Result of getSubscribeRankingModel: Get Subscribe Ranking Model
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingmodel
 */
class GetSubscribeRankingModelResult implements IResult {
    /** @var SubscribeRankingModel Subscribe Ranking Model */
    private $item;

    /** @return SubscribeRankingModel|null Subscribe Ranking Model */
	public function getItem(): ?SubscribeRankingModel {
		return $this->item;
	}

    /** @param SubscribeRankingModel|null $item Subscribe Ranking Model */
	public function setItem(?SubscribeRankingModel $item) {
		$this->item = $item;
	}

    /**
     * @param SubscribeRankingModel|null $item Subscribe Ranking Model
     * @return GetSubscribeRankingModelResult
     */
	public function withItem(?SubscribeRankingModel $item): GetSubscribeRankingModelResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSubscribeRankingModelResult {
        if ($data === null) {
            return null;
        }
        return (new GetSubscribeRankingModelResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SubscribeRankingModel::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}