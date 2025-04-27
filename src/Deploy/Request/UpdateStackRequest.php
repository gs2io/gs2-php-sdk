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

class UpdateStackRequest extends Gs2BasicRequest {
    /** @var string */
    private $stackName;
    /** @var string */
    private $description;
    /** @var string */
    private $mode;
    /** @var string */
    private $template;
    /** @var string */
    private $uploadToken;
	public function getStackName(): ?string {
		return $this->stackName;
	}
	public function setStackName(?string $stackName) {
		$this->stackName = $stackName;
	}
	public function withStackName(?string $stackName): UpdateStackRequest {
		$this->stackName = $stackName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateStackRequest {
		$this->description = $description;
		return $this;
	}
	public function getMode(): ?string {
		return $this->mode;
	}
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
	public function withMode(?string $mode): UpdateStackRequest {
		$this->mode = $mode;
		return $this;
	}
	public function getTemplate(): ?string {
		return $this->template;
	}
	public function setTemplate(?string $template) {
		$this->template = $template;
	}
	public function withTemplate(?string $template): UpdateStackRequest {
		$this->template = $template;
		return $this;
	}
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
	public function withUploadToken(?string $uploadToken): UpdateStackRequest {
		$this->uploadToken = $uploadToken;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateStackRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateStackRequest())
            ->withStackName(array_key_exists('stackName', $data) && $data['stackName'] !== null ? $data['stackName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMode(array_key_exists('mode', $data) && $data['mode'] !== null ? $data['mode'] : null)
            ->withTemplate(array_key_exists('template', $data) && $data['template'] !== null ? $data['template'] : null)
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null);
    }

    public function toJson(): array {
        return array(
            "stackName" => $this->getStackName(),
            "description" => $this->getDescription(),
            "mode" => $this->getMode(),
            "template" => $this->getTemplate(),
            "uploadToken" => $this->getUploadToken(),
        );
    }
}