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

namespace Gs2\Datastore\Result;

use Gs2\Core\Model\IResult;
use Gs2\Datastore\Model\DataObjectHistory;

/**
 * Result of getDataObjectHistory: Get Data Object History
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#getdataobjecthistory
 */
class GetDataObjectHistoryResult implements IResult {
    /** @var DataObjectHistory Data Object History */
    private $item;

    /** @return DataObjectHistory|null Data Object History */
	public function getItem(): ?DataObjectHistory {
		return $this->item;
	}

    /** @param DataObjectHistory|null $item Data Object History */
	public function setItem(?DataObjectHistory $item) {
		$this->item = $item;
	}

    /**
     * @param DataObjectHistory|null $item Data Object History
     * @return GetDataObjectHistoryResult
     */
	public function withItem(?DataObjectHistory $item): GetDataObjectHistoryResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetDataObjectHistoryResult {
        if ($data === null) {
            return null;
        }
        return (new GetDataObjectHistoryResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? DataObjectHistory::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}