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

namespace Gs2\Account\Model;

use Gs2\Core\Model\IModel;


/**
 * Takeover Type Model
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#takeovertypemodel
 */
class TakeOverTypeModel implements IModel {
	/**
     * @var string Takeover Type Model GRN
	 */
	private $takeOverTypeModelId;
	/**
     * @var int Slot Number
	 */
	private $type;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Takeover Method
	 */
	private $takeOverMethod;
	/**
     * @var OpenIdConnectSetting OpenID Connect Configuration
	 */
	private $openIdConnectSetting;
	/**
     * @var IssuedCodeSetting Issued Takeover Code Configuration
	 */
	private $issuedCodeSetting;
    /** @return string|null Takeover Type Model GRN */
	public function getTakeOverTypeModelId(): ?string {
		return $this->takeOverTypeModelId;
	}
    /** @param string|null $takeOverTypeModelId Takeover Type Model GRN */
	public function setTakeOverTypeModelId(?string $takeOverTypeModelId) {
		$this->takeOverTypeModelId = $takeOverTypeModelId;
	}
    /**
     * @param string|null $takeOverTypeModelId Takeover Type Model GRN
     * @return TakeOverTypeModel
     */
	public function withTakeOverTypeModelId(?string $takeOverTypeModelId): TakeOverTypeModel {
		$this->takeOverTypeModelId = $takeOverTypeModelId;
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
     * @return TakeOverTypeModel
     */
	public function withType(?int $type): TakeOverTypeModel {
		$this->type = $type;
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
     * @return TakeOverTypeModel
     */
	public function withMetadata(?string $metadata): TakeOverTypeModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Takeover Method */
	public function getTakeOverMethod(): ?string {
		return $this->takeOverMethod;
	}
    /** @param string|null $takeOverMethod Takeover Method */
	public function setTakeOverMethod(?string $takeOverMethod) {
		$this->takeOverMethod = $takeOverMethod;
	}
    /**
     * @param string|null $takeOverMethod Takeover Method
     * @return TakeOverTypeModel
     */
	public function withTakeOverMethod(?string $takeOverMethod): TakeOverTypeModel {
		$this->takeOverMethod = $takeOverMethod;
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
     * @return TakeOverTypeModel
     */
	public function withOpenIdConnectSetting(?OpenIdConnectSetting $openIdConnectSetting): TakeOverTypeModel {
		$this->openIdConnectSetting = $openIdConnectSetting;
		return $this;
	}
    /** @return IssuedCodeSetting|null Issued Takeover Code Configuration */
	public function getIssuedCodeSetting(): ?IssuedCodeSetting {
		return $this->issuedCodeSetting;
	}
    /** @param IssuedCodeSetting|null $issuedCodeSetting Issued Takeover Code Configuration */
	public function setIssuedCodeSetting(?IssuedCodeSetting $issuedCodeSetting) {
		$this->issuedCodeSetting = $issuedCodeSetting;
	}
    /**
     * @param IssuedCodeSetting|null $issuedCodeSetting Issued Takeover Code Configuration
     * @return TakeOverTypeModel
     */
	public function withIssuedCodeSetting(?IssuedCodeSetting $issuedCodeSetting): TakeOverTypeModel {
		$this->issuedCodeSetting = $issuedCodeSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?TakeOverTypeModel {
        if ($data === null) {
            return null;
        }
        return (new TakeOverTypeModel())
            ->withTakeOverTypeModelId(array_key_exists('takeOverTypeModelId', $data) && $data['takeOverTypeModelId'] !== null ? $data['takeOverTypeModelId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTakeOverMethod(array_key_exists('takeOverMethod', $data) && $data['takeOverMethod'] !== null ? $data['takeOverMethod'] : null)
            ->withOpenIdConnectSetting(array_key_exists('openIdConnectSetting', $data) && $data['openIdConnectSetting'] !== null ? OpenIdConnectSetting::fromJson($data['openIdConnectSetting']) : null)
            ->withIssuedCodeSetting(array_key_exists('issuedCodeSetting', $data) && $data['issuedCodeSetting'] !== null ? IssuedCodeSetting::fromJson($data['issuedCodeSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "takeOverTypeModelId" => $this->getTakeOverTypeModelId(),
            "type" => $this->getType(),
            "metadata" => $this->getMetadata(),
            "takeOverMethod" => $this->getTakeOverMethod(),
            "openIdConnectSetting" => $this->getOpenIdConnectSetting() !== null ? $this->getOpenIdConnectSetting()->toJson() : null,
            "issuedCodeSetting" => $this->getIssuedCodeSetting() !== null ? $this->getIssuedCodeSetting()->toJson() : null,
        );
    }
}