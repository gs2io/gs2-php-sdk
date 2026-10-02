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

namespace Gs2\Guild\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateMemberMetadata: Update member metadata
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#updatemembermetadata
 */
class UpdateMemberMetadataRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Guild Name */
    private $guildName;
    /** @var string User ID to be updated */
    private $accessToken;
    /** @var string Guild Member Metadata */
    private $metadata;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateMemberMetadataRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateMemberMetadataRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Guild Model name */
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
    /** @param string|null $guildModelName Guild Model name */
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
    /**
     * @param string|null $guildModelName Guild Model name
     * @return UpdateMemberMetadataRequest
     */
	public function withGuildModelName(?string $guildModelName): UpdateMemberMetadataRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null Guild Name */
	public function getGuildName(): ?string {
		return $this->guildName;
	}
    /** @param string|null $guildName Guild Name */
	public function setGuildName(?string $guildName) {
		$this->guildName = $guildName;
	}
    /**
     * @param string|null $guildName Guild Name
     * @return UpdateMemberMetadataRequest
     */
	public function withGuildName(?string $guildName): UpdateMemberMetadataRequest {
		$this->guildName = $guildName;
		return $this;
	}
    /** @return string|null User ID to be updated */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID to be updated */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID to be updated
     * @return UpdateMemberMetadataRequest
     */
	public function withAccessToken(?string $accessToken): UpdateMemberMetadataRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Guild Member Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Guild Member Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Guild Member Metadata
     * @return UpdateMemberMetadataRequest
     */
	public function withMetadata(?string $metadata): UpdateMemberMetadataRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateMemberMetadataRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateMemberMetadataRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateMemberMetadataRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withGuildName(array_key_exists('guildName', $data) && $data['guildName'] !== null ? $data['guildName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "guildName" => $this->getGuildName(),
            "accessToken" => $this->getAccessToken(),
            "metadata" => $this->getMetadata(),
        );
    }
}