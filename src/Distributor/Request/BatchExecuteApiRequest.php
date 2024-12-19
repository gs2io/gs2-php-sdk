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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Distributor\Model\BatchRequestPayload;

class BatchExecuteApiRequest extends Gs2BasicRequest {
    /** @var array */
    private $requestPayloads;
	public function getRequestPayloads(): ?array {
		return $this->requestPayloads;
	}
	public function setRequestPayloads(?array $requestPayloads) {
		$this->requestPayloads = $requestPayloads;
	}
	public function withRequestPayloads(?array $requestPayloads): BatchExecuteApiRequest {
		$this->requestPayloads = $requestPayloads;
		return $this;
	}

    public static function fromJson(?array $data): ?BatchExecuteApiRequest {
        if ($data === null) {
            return null;
        }
        return (new BatchExecuteApiRequest())
            ->withRequestPayloads(array_map(
                function ($item) {
                    return BatchRequestPayload::fromJson($item);
                },
                array_key_exists('requestPayloads', $data) && $data['requestPayloads'] !== null ? $data['requestPayloads'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "requestPayloads" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRequestPayloads() !== null && $this->getRequestPayloads() !== null ? $this->getRequestPayloads() : []
            ),
        );
    }
}