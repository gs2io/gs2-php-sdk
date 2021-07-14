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

namespace Gs2\Limit\Result;

use Gs2\Core\Model\IResult;

class GetNamespaceStatusResult implements IResult {
    /** @var string */
    private $status;

	public function getStatus(): ?string {
		return $this->status;
	}

	public function setStatus(?string $status) {
		$this->status = $status;
	}

	public function withStatus(?string $status): GetNamespaceStatusResult {
		$this->status = $status;
		return $this;
	}

    public static function fromJson(?array $data): ?GetNamespaceStatusResult {
        if ($data === null) {
            return null;
        }
        return (new GetNamespaceStatusResult())
            ->withStatus(empty($data['status']) ? null : $data['status']);
    }

    public function toJson(): array {
        return array(
            "status" => $this->getStatus(),
        );
    }
}