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


/**
 * Attached Security Policy
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#attachsecuritypolicy
 */
class AttachSecurityPolicy implements IModel {
	/**
     * @var string GS2-Identifier User GRN
	 */
	private $userId;
	/**
     * @var array List of Security Policy GRNs
	 */
	private $securityPolicyIds;
	/**
     * @var int Creation Timestamp
	 */
	private $attachedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null GS2-Identifier User GRN */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId GS2-Identifier User GRN */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId GS2-Identifier User GRN
     * @return AttachSecurityPolicy
     */
	public function withUserId(?string $userId): AttachSecurityPolicy {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null List of Security Policy GRNs */
	public function getSecurityPolicyIds(): ?array {
		return $this->securityPolicyIds;
	}
    /** @param array|null $securityPolicyIds List of Security Policy GRNs */
	public function setSecurityPolicyIds(?array $securityPolicyIds) {
		$this->securityPolicyIds = $securityPolicyIds;
	}
    /**
     * @param array|null $securityPolicyIds List of Security Policy GRNs
     * @return AttachSecurityPolicy
     */
	public function withSecurityPolicyIds(?array $securityPolicyIds): AttachSecurityPolicy {
		$this->securityPolicyIds = $securityPolicyIds;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getAttachedAt(): ?int {
		return $this->attachedAt;
	}
    /** @param int|null $attachedAt Creation Timestamp */
	public function setAttachedAt(?int $attachedAt) {
		$this->attachedAt = $attachedAt;
	}
    /**
     * @param int|null $attachedAt Creation Timestamp
     * @return AttachSecurityPolicy
     */
	public function withAttachedAt(?int $attachedAt): AttachSecurityPolicy {
		$this->attachedAt = $attachedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return AttachSecurityPolicy
     */
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
            ->withSecurityPolicyIds(!array_key_exists('securityPolicyIds', $data) || $data['securityPolicyIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['securityPolicyIds']
            ))
            ->withAttachedAt(array_key_exists('attachedAt', $data) && $data['attachedAt'] !== null ? $data['attachedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "securityPolicyIds" => $this->getSecurityPolicyIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getSecurityPolicyIds()
            ),
            "attachedAt" => $this->getAttachedAt(),
            "revision" => $this->getRevision(),
        );
    }
}