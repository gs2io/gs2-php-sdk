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

namespace Gs2\Project\Result;

use Gs2\Core\Model\IResult;
use Gs2\Project\Model\Gs2Region;
use Gs2\Project\Model\Project;

class GetProjectTokenByIdentifierResult implements IResult {
    /** @var Project */
    private $item;
    /** @var string */
    private $ownerId;
    /** @var string */
    private $projectToken;

	public function getItem(): ?Project {
		return $this->item;
	}

	public function setItem(?Project $item) {
		$this->item = $item;
	}

	public function withItem(?Project $item): GetProjectTokenByIdentifierResult {
		$this->item = $item;
		return $this;
	}

	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	public function withOwnerId(?string $ownerId): GetProjectTokenByIdentifierResult {
		$this->ownerId = $ownerId;
		return $this;
	}

	public function getProjectToken(): ?string {
		return $this->projectToken;
	}

	public function setProjectToken(?string $projectToken) {
		$this->projectToken = $projectToken;
	}

	public function withProjectToken(?string $projectToken): GetProjectTokenByIdentifierResult {
		$this->projectToken = $projectToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProjectTokenByIdentifierResult {
        if ($data === null) {
            return null;
        }
        return (new GetProjectTokenByIdentifierResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Project::fromJson($data['item']) : null)
            ->withOwnerId(array_key_exists('ownerId', $data) && $data['ownerId'] !== null ? $data['ownerId'] : null)
            ->withProjectToken(array_key_exists('projectToken', $data) && $data['projectToken'] !== null ? $data['projectToken'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "ownerId" => $this->getOwnerId(),
            "projectToken" => $this->getProjectToken(),
        );
    }
}