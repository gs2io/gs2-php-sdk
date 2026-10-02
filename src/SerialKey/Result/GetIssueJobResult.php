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

namespace Gs2\SerialKey\Result;

use Gs2\Core\Model\IResult;
use Gs2\SerialKey\Model\IssueJob;

/**
 * Result of getIssueJob: Get Serial Code Issuance Job
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#getissuejob
 */
class GetIssueJobResult implements IResult {
    /** @var IssueJob Serial Code Issuance Job */
    private $item;

    /** @return IssueJob|null Serial Code Issuance Job */
	public function getItem(): ?IssueJob {
		return $this->item;
	}

    /** @param IssueJob|null $item Serial Code Issuance Job */
	public function setItem(?IssueJob $item) {
		$this->item = $item;
	}

    /**
     * @param IssueJob|null $item Serial Code Issuance Job
     * @return GetIssueJobResult
     */
	public function withItem(?IssueJob $item): GetIssueJobResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetIssueJobResult {
        if ($data === null) {
            return null;
        }
        return (new GetIssueJobResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? IssueJob::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}