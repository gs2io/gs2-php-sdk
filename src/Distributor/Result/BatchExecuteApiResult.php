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
use Gs2\Distributor\Model\BatchResultPayload;

class BatchExecuteApiResult implements IResult {
    /** @var array */
    private $results;

	public function getResults(): ?array {
		return $this->results;
	}

	public function setResults(?array $results) {
		$this->results = $results;
	}

	public function withResults(?array $results): BatchExecuteApiResult {
		$this->results = $results;
		return $this;
	}

    public static function fromJson(?array $data): ?BatchExecuteApiResult {
        if ($data === null) {
            return null;
        }
        return (new BatchExecuteApiResult())
            ->withResults(array_map(
                function ($item) {
                    return BatchResultPayload::fromJson($item);
                },
                array_key_exists('results', $data) && $data['results'] !== null ? $data['results'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "results" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getResults() !== null && $this->getResults() !== null ? $this->getResults() : []
            ),
        );
    }
}