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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Account\Model\ScopeValue;
use Gs2\Account\Model\OpenIdConnectSetting;

/**
 * Request for updateTakeOverTypeModelMaster: Update Takeover Type Model Master
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#updatetakeovertypemodelmaster
 */
class UpdateTakeOverTypeModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var int Slot Number */
    private $type;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var OpenIdConnectSetting OpenID Connect Configuration */
    private $openIdConnectSetting;
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
     * @return UpdateTakeOverTypeModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateTakeOverTypeModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return int|null Slot Number */
	public function getType(): ?int {
		return $this->type;
	}
    /** @param int|null $type Slot Number */
	public function setType(?int $type) {
		$this->type = $type;
	}
    /**
     * @param int|null $type Slot Number
     * @return UpdateTakeOverTypeModelMasterRequest
     */
	public function withType(?int $type): UpdateTakeOverTypeModelMasterRequest {
		$this->type = $type;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateTakeOverTypeModelMasterRequest
     */
	public function withDescription(?string $description): UpdateTakeOverTypeModelMasterRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return UpdateTakeOverTypeModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateTakeOverTypeModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return OpenIdConnectSetting|null OpenID Connect Configuration */
	public function getOpenIdConnectSetting(): ?OpenIdConnectSetting {
		return $this->openIdConnectSetting;
	}
    /** @param OpenIdConnectSetting|null $openIdConnectSetting OpenID Connect Configuration */
	public function setOpenIdConnectSetting(?OpenIdConnectSetting $openIdConnectSetting) {
		$this->openIdConnectSetting = $openIdConnectSetting;
	}
    /**
     * @param OpenIdConnectSetting|null $openIdConnectSetting OpenID Connect Configuration
     * @return UpdateTakeOverTypeModelMasterRequest
     */
	public function withOpenIdConnectSetting(?OpenIdConnectSetting $openIdConnectSetting): UpdateTakeOverTypeModelMasterRequest {
		$this->openIdConnectSetting = $openIdConnectSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateTakeOverTypeModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateTakeOverTypeModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withOpenIdConnectSetting(array_key_exists('openIdConnectSetting', $data) && $data['openIdConnectSetting'] !== null ? OpenIdConnectSetting::fromJson($data['openIdConnectSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "type" => $this->getType(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "openIdConnectSetting" => $this->getOpenIdConnectSetting() !== null ? $this->getOpenIdConnectSetting()->toJson() : null,
        );
    }
}