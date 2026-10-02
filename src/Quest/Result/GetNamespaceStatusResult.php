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

namespace Gs2\Quest\Result;

use Gs2\Core\Model\IResult;

/**
 * Result of getNamespaceStatus: Get Namespace Status
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#getnamespacestatus
 */
class GetNamespaceStatusResult implements IResult {
    /** @var string Namespace Status */
    private $status;

    /** @return string|null Namespace Status */
	public function getStatus(): ?string {
		return $this->status;
	}

    /** @param string|null $status Namespace Status */
	public function setStatus(?string $status) {
		$this->status = $status;
	}

    /**
     * @param string|null $status Namespace Status
     * @return GetNamespaceStatusResult
     */
	public function withStatus(?string $status): GetNamespaceStatusResult {
		$this->status = $status;
		return $this;
	}

    public static function fromJson(?array $data): ?GetNamespaceStatusResult {
        if ($data === null) {
            return null;
        }
        return (new GetNamespaceStatusResult())
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null);
    }

    public function toJson(): array {
        return array(
            "status" => $this->getStatus(),
        );
    }
}