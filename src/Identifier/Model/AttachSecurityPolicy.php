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

namespace Gs2\Identifier\Model;

use Gs2\Core\Model\IModel;


class AttachSecurityPolicy implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $securityPolicyIds;
	/**
     * @var int
	 */
	private $attachedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): AttachSecurityPolicy {
		$this->userId = $userId;
		return $this;
	}
	public function getSecurityPolicyIds(): ?array {
		return $this->securityPolicyIds;
	}
	public function setSecurityPolicyIds(?array $securityPolicyIds) {
		$this->securityPolicyIds = $securityPolicyIds;
	}
	public function withSecurityPolicyIds(?array $securityPolicyIds): AttachSecurityPolicy {
		$this->securityPolicyIds = $securityPolicyIds;
		return $this;
	}
	public function getAttachedAt(): ?int {
		return $this->attachedAt;
	}
	public function setAttachedAt(?int $attachedAt) {
		$this->attachedAt = $attachedAt;
	}
	public function withAttachedAt(?int $attachedAt): AttachSecurityPolicy {
		$this->attachedAt = $attachedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): AttachSecurityPolicy {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?AttachSecurityPolicy {
        if ($data === null) {
            return null;
        }
        return (new AttachSecurityPolicy())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSecurityPolicyIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('securityPolicyIds', $data) && $data['securityPolicyIds'] !== null ? $data['securityPolicyIds'] : []
            ))
            ->withAttachedAt(array_key_exists('attachedAt', $data) && $data['attachedAt'] !== null ? $data['attachedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "securityPolicyIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getSecurityPolicyIds() !== null && $this->getSecurityPolicyIds() !== null ? $this->getSecurityPolicyIds() : []
            ),
            "attachedAt" => $this->getAttachedAt(),
            "revision" => $this->getRevision(),
        );
    }
}