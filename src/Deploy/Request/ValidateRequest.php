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

namespace Gs2\Deploy\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for validate: Validate Template
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/#validate
 */
class ValidateRequest extends Gs2BasicRequest {
    /** @var string Update mode */
    private $mode;
    /** @var string Template data */
    private $template;
    /** @var string Token obtained by pre-upload */
    private $uploadToken;
    /** @return string|null Update mode */
	public function getMode(): ?string {
		return $this->mode;
	}
    /** @param string|null $mode Update mode */
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
    /**
     * @param string|null $mode Update mode
     * @return ValidateRequest
     */
	public function withMode(?string $mode): ValidateRequest {
		$this->mode = $mode;
		return $this;
	}
    /** @return string|null Template data */
	public function getTemplate(): ?string {
		return $this->template;
	}
    /** @param string|null $template Template data */
	public function setTemplate(?string $template) {
		$this->template = $template;
	}
    /**
     * @param string|null $template Template data
     * @return ValidateRequest
     */
	public function withTemplate(?string $template): ValidateRequest {
		$this->template = $template;
		return $this;
	}
    /** @return string|null Token obtained by pre-upload */
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
    /** @param string|null $uploadToken Token obtained by pre-upload */
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
    /**
     * @param string|null $uploadToken Token obtained by pre-upload
     * @return ValidateRequest
     */
	public function withUploadToken(?string $uploadToken): ValidateRequest {
		$this->uploadToken = $uploadToken;
		return $this;
	}

    public static function fromJson(?array $data): ?ValidateRequest {
        if ($data === null) {
            return null;
        }
        return (new ValidateRequest())
            ->withMode(array_key_exists('mode', $data) && $data['mode'] !== null ? $data['mode'] : null)
            ->withTemplate(array_key_exists('template', $data) && $data['template'] !== null ? $data['template'] : null)
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null);
    }

    public function toJson(): array {
        return array(
            "mode" => $this->getMode(),
            "template" => $this->getTemplate(),
            "uploadToken" => $this->getUploadToken(),
        );
    }
}