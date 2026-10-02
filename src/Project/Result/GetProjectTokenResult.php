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

/** Result of getProjectToken: Issue project tokens */
class GetProjectTokenResult implements IResult {
    /** @var Project Projects signed in to */
    private $item;
    /** @var string Owner ID */
    private $ownerId;
    /** @var string Signed in to the project token. */
    private $projectToken;

    /** @return Project|null Projects signed in to */
	public function getItem(): ?Project {
		return $this->item;
	}

    /** @param Project|null $item Projects signed in to */
	public function setItem(?Project $item) {
		$this->item = $item;
	}

    /**
     * @param Project|null $item Projects signed in to
     * @return GetProjectTokenResult
     */
	public function withItem(?Project $item): GetProjectTokenResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Owner ID */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

    /** @param string|null $ownerId Owner ID */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

    /**
     * @param string|null $ownerId Owner ID
     * @return GetProjectTokenResult
     */
	public function withOwnerId(?string $ownerId): GetProjectTokenResult {
		$this->ownerId = $ownerId;
		return $this;
	}

    /** @return string|null Signed in to the project token. */
	public function getProjectToken(): ?string {
		return $this->projectToken;
	}

    /** @param string|null $projectToken Signed in to the project token. */
	public function setProjectToken(?string $projectToken) {
		$this->projectToken = $projectToken;
	}

    /**
     * @param string|null $projectToken Signed in to the project token.
     * @return GetProjectTokenResult
     */
	public function withProjectToken(?string $projectToken): GetProjectTokenResult {
		$this->projectToken = $projectToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProjectTokenResult {
        if ($data === null) {
            return null;
        }
        return (new GetProjectTokenResult())
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